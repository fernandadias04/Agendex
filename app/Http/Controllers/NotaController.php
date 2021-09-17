<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNotasRequest;
use App\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (Request $request, $contatoId)
    {
        $query = Nota::query();

        $query->where('contato_id', '=', $contatoId);
        $notas = $query->paginate(10);
        $notas->appends($request->all());
        return view('contatos.notas.notas', compact('notas', 'contatoId'));
    }

    public function cadastro (Request $request, $contatoId){
        return view('contatos.notas.cadastro', compact('contatoId'));
    }

    public function store (Request $request, $contatoId)
    {
        $nota = Nota::create([
            'titulo'=>$request->titulo,
            'texto'=>$request->texto,
            'contato_id'=>$contatoId,
        ]);

        return redirect()->route('contatos.notas.notas', compact('contatoId'));
    }

    public function edit (Request $request, $contatoId)
    {
        $nota = Nota::findOrFail($request->id);
        return view('contatos.notas.editar', compact('nota', 'contatoId'));
    }

    public function update (UpdateNotasRequest $request, $contatoId)
    {
        $nota = Nota::findOrFail($request->id);
        $nota->update([
            'titulo'=>$request->titulo,
            'texto'=>$request->texto,
        ]);

        return redirect()->route('contatos.notas.notas', compact('contatoId'))->with('mensagem', 'Nota editada com sucesso!');
    }

    public function destroy (Request $request, $contatoId)
    {
        $nota = Nota::findOrFail($request->id);
        $nota->delete();
        $request->session()->flash(
        'mensagem',
        "Nota removida com sucesso"
        );

        return redirect()->route('contatos.notas.notas', compact('contatoId'));
    }
}
