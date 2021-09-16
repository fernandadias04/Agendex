<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Contato;
use App\Http\Requests\UpdateContatoRequest;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
use Illuminate\Http\Response;

class ContatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Contato::query();

        $query->where('user_id', '=' , auth()->id());

        if ($request->has('consulta'))
        {
            $query->where('nome', 'like', '%'.str_replace(' ', '%', $request->get('consulta')).'%');
        }

        $query->orderBy('nome', 'ASC');
        $contatos = $query->paginate(10);
        $contatos->appends($request->all());
        return view('contatos.index', compact('contatos'));
    }

    public function cadastro()
    {
        return view('contatos.cadastro');
    }

    public function store(Request $request)
    {
        $caminho = null;

        if($request->file('foto'))
        {
            $img = $request->file('foto');
            $caminho =  $img->store('fotos', 'public');
        }
       $contato = Contato::create([
            'nome'=>$request->nome,
            'telefone'=>$request->telefone,
            'foto'=> $caminho,
            'user_id'=>auth()->id(),
        ]);

        return redirect()->route('contatos.index')->with('mensagem', 'Contato cadastrado com sucesso!');

    }

    public function destroy (Request $request)
    {
        $contato = Contato::findOrFail($request->id);
        if($contato->user_id != auth()->id())
        {
            abort(Response::HTTP_FORBIDDEN);
        }

        $contato->delete();
        $request->session()->flash(
        'mensagem',
        "Contato removido com sucesso"
        );

        return redirect()->route('contatos.index');

    }

    public function edit ($id)
    {
        $contato = Contato::findOrFail($id);
        if($contato->user_id != auth()->id())
        {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('contatos.edit', compact('contato'));

    }

    public function update(UpdateContatoRequest $request, $id)
    {
        $contato = Contato::findOrFail($id);
        if($contato->user_id != auth()->id())
        {
            abort(Response::HTTP_FORBIDDEN);
        }

        $caminho = $contato->foto;

        if($request->file('foto'))
        {
            $img = $request->file('foto');
            $caminho =  $img->store('fotos', 'public');
        }

        $contato -> update([
            'nome'=>$request->nome,
            'telefone'=>$request->telefone,
            'foto'=>$caminho
        ]);

        return redirect()->route('contatos.index')->with('mensagem', 'Contato editado com sucesso!');
    }




}
