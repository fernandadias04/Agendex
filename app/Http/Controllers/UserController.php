<?php
namespace app\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function destroy (Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->delete();
        $request->session()->flash(
        'mensagem',
        "Usuário removido com sucesso"
        );

        return redirect()->route('home');

    }

    public function edit(){
        $user = auth()->user();
        return view('user.user', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {

        /** @var User $user */
        $user = auth()->user();

        $password=$user->password;

        if($request->password){
            $password=bcrypt($request->get('password'));
        }

        $user->update([
            'name'=>$request->name,
            'password'=>$password,
            'email'=>$request->email
        ]);

        return redirect()->route('contatos.index')->with('mensagem', 'Contato editado com sucesso!');
    }




}
