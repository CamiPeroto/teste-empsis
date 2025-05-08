<?php
namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\UserRequest;
use App\Models\State;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('created_at')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show(User $user)
    {
        $user->load('address.stateRelation');

        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function create(User $user)
    {
    $states = State::orderBy('name')->pluck('name', 'uf');

    return view('users.create', [
        'user' => $user,
        'states' => $states,
    ]);
    }

    public function store(UserRequest $request, AddressRequest $addressRequest)
    {
        $request->validated();
        $addressRequest->validated();

        DB::beginTransaction();

        try {

            $user = User::create([
                'name'         => $request->name,
                'email'        => $request->email,
                'cpf'          => $request->cpf,
                'phone_number' => $request->phone_number,          
            ]);
           
            $user->address()->create([
                'street'   => $request->street,
                'number'   => $request->number,
                'district' => $request->district,
                'city'     => $request->city,
                'state'    => $request->state,
                'zip_code' => $request->zip_code,
            ]);

            DB::commit();

            return redirect()->route('user.show', ['user' => $user->cpf])->with('success', 'Usuário cadastrado com sucesso!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Erro ao cadastrar o usuário: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Usuário não cadastrado!');
        }
    }

    public function edit(User $user)
    {  
        $states = State::orderBy('name')->pluck('name', 'uf');

        $address = $user->address;
        
        return view('users.edit', [
            'user' => $user,
            'address' => $address,
            'states' => $states,
    ]);
    }

    public function update(UserRequest $request, AddressRequest $addressRequest, User $user)
    {
        $request->validated();
        $addressRequest->validated();

        DB::beginTransaction();

        try {

            $user->update([
                'name'         => $request->name,
                'email'        => $request->email,
                'cpf'          => $request->cpf,
                'phone_number' => $request->phone_number,
            ]);
            $user->address()->update([ 
                'street'   => $addressRequest->street,
                'number'   => $addressRequest->number,
                'district' => $addressRequest->district,
                'city'     => $addressRequest->city,
                'zip_code' => $addressRequest->zip_code,
                'state' => $addressRequest->state,
            ]);

            DB::commit();

            return redirect()->route('user.show', ['user' => $user->cpf])->with('success', 'Usuário editado com sucesso!');
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
            Log::error('Erro ao excluir o usuário: ' . $e->getMessage());
            return redirect()->route('user.index')->with('error', 'Usuário não excluído!');
        }
    }
    public function search(Request $request)
    {
        $term = $request->input('term');

        $users = User::where('name', 'LIKE', "%{$term}%")
                    ->orWhere('cpf', 'LIKE', "%{$term}%")
                    ->get();

        return response()->json($users);
    }

}
