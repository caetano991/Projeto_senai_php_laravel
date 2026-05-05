<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    // LISTAR
    public function index (Request $request){ 
		// Realiza uma consulta ao modelo User, aplicando filtros dinamicamente conforme os parâmetros de requisição 
		$users = User::when($request->has('name'), function ($whenQuery) use ($request) { 
		// Se houver o parâmetro 'name' na requisição, aplica um filtro LIKE no campo 'name'
		$whenQuery->where('name', 'like', '%' . $request->name . '%');
		}) 
		->when($request->has('email'), function ($whenQuery) use ($request) { 
		// Se houver o parâmetro 'email' na requisição, aplica um filtro LIKE no campo 'email'
		$whenQuery->where('email', 'like', '%' . $request->email . '%'); 
		}) 
		->orderBy('id')// Ordena os resultados pelo ID 
		->paginate(10) // Pagina os resultados, exibindo 10 por página 
		->withQueryString(); // Mantém os parâmetros da query string na paginação 
		
		// Retorna a view 'user.index' passando os dados necessários 
		return view('user.index', [ 
				'menu' => 'users', // Indica qual menu está ativo 
				'users' => $users, // Lista paginada de usuários filtrada 
				'name' => $request->name, // Preserva o filtro 'name' no formulário 
				'email' => $request->email // Preserva o filtro 'email' no formulário 
				]); 
		}

    // FORM CRIAR
    public function create(){
        return view('user.create');
    }

    // SALVAR
    public function store(UserRequest $request)
    {
        $imageName = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/'), $imageName);
        }

        $request->validated();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // ✅ corrigido
            'image' => $imageName,
        ]);

        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    // MOSTRAR (com navegação)
    public function show(User $user){
        $prev = User::where('id', '<', $user->id)->orderBy('id', 'desc')->first();
        $next = User::where('id', '>', $user->id)->orderBy('id')->first();

        return view('user.show', compact('user', 'prev', 'next'));
    }

    // EDITAR (com navegação)
    public function edit(User $user){
        $prev = User::where('id', '<', $user->id)->orderBy('id', 'desc')->first();
        $next = User::where('id', '>', $user->id)->orderBy('id')->first();

        return view('user.edit', compact('user', 'prev', 'next'));
    }

    // ATUALIZAR
    public function update(UserRequest $request, User $user){
        $request->validated();

        $imageName = $user->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/'), $imageName);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $imageName,
        ];

        // Atualiza senha só se preencher
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data); // ✅ ESSENCIAL

        return redirect()->route('user.show', $user)
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    // DELETAR
    public function destroy(User $user){
        $user->delete();

        return redirect()->route('user.index')
            ->with('delete_success', 'Usuário excluído com sucesso!');
    }

    //Gerar PDF Pesquisa
public function generatePdf(Request $request)
{
    $users = User::when($request->has('name'), function ($whenQuery) use ($request) {
        $whenQuery->where('name', 'like', '%' . $request->name . '%');
    })
    ->when($request->has('email'), function ($whenQuery) use ($request) {
        $whenQuery->where('email', 'like', '%' . $request->email . '%');
    })
    ->when($request->filled('start_date_registration'), function ($whenQuery) use ($request){
        $whenQuery->where('created_at', '>=', \Carbon\Carbon::parse($request->start_date_registration)->format('Y-m-d H:i:s'));
    })
    ->when($request->filled('end_date_registration'), function ($whenQuery) use ($request){
        $whenQuery->where('created_at', '<=', \Carbon\Carbon::parse($request->end_date_registration)->format('Y-m-d H:i:s'));
    })
    ->orderBy('created_at')
    ->get();

    // Somar total de registros
    $totalRecords = $users->count('id');

    // Verificar se a quantidade de registros ultrapassa o limite para gerar PDF
    $numberRecordsAllowed = 500;
    if($totalRecords > $numberRecordsAllowed){

        // Redirecionar o usuário, enviar a mensagem de erro
        return redirect()->route('user.index', [
            'name' => $request->name,
            'email' => $request->email,
            'start_date_registration' => $request->start_date_registration,
            'end_date_registration' => $request->end_date_registration,
        ])->with('error', "Limite de registros ultrapassado para gerar PDF. O limite é de $numberRecordsAllowed registros!");
    }

    // Carregar a string com o HTML/conteúdo e determinar a orientação e o tamanho do arquivo
    $pdf = PDF::loadView('user.generatePdf', ['users' => $users])->setPaper('a4', 'portrait');

    // Fazer o download do arquivo
    return $pdf->download('list_users.pdf');
}
}