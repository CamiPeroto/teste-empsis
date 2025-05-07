<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderByDesc('created_at')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }
    public function create(User $user)
    {
        $states = \App\Models\User::select('state')->distinct()->orderBy('state')->pluck('state');

        return view('users.create', [
        'user' => $user, 
        'states' => $states,
        ]);
    }

    public function store(UserRequest $request)
    {
        $request->validated();

        DB::beginTransaction();

        try {

            $user = User::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'cpf'          => $request->cpf,
                'phone_number' => $request->phone_number,
                'street'       => $request->street,
                'number'       => $request->number,
                'district'     => $request->district,
                'city'         => $request->city,
                'state'        => $request->state,
                'zip_code'     => $request->zip_code,

            ]);

            DB::commit();

            return redirect()->route('user.show', ['user' => $user->cpf])->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {

            DB::rollBack();

            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }

    public function edit(User $user)
    {  
        $states = \App\Models\User::select('state')->distinct()->orderBy('state')->pluck('state');
        
        return view('users.edit', [
            'user' => $user,
            'states' => $states,
    ]);
    }

    public function update(UserRequest $request, User $user)
    {
        $request->validated();

        DB::beginTransaction();

        try {

            $user->update([
                'name'         => $request->name,
                'email'        => $request->email,
                'cpf'          => $request->cpf,
                'phone_number' => $request->phone_number,
                'street'       => $request->street,
                'number'       => $request->number,
                'district'     => $request->district,
                'city'         => $request->city,
                'state'        => $request->state,
                'zip_code'     => $request->zip_code,
            ]);

            DB::commit();

            return redirect()->route('user.show', ['user' => $request->user])->with('success', 'Usuário editado com sucesso!');
        } catch (Exception $e) {

            DB::rollBack();

            return back()->withInput()->with('error', 'Usuário não editado!');
        }
    }

    public function destroy(User $user)
    {
        try {

            $user->delete();

            return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');

        } catch (Exception $e) {

            return redirect()->route('user.index')->with('error', 'Usuário não excluído!');
        }
    }

}
