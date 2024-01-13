<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;


class UsersController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::users()->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del usuario es obligatorio',
            'name.min' => 'El nombre del usuario usurio debe tener mas de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una direccion de correo electronico valido',
            'cedula.required' => 'La cedula es obligatoria',
            'cedula.digits' => 'La cedula debe tener 10 digitos',
            'phone.email' => 'El numero de telefono es obligatorio',
        ];
        
        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name', 'email', 'cedula', 'phone')
            +[
                'role' => 'usuario',
                'password' => bcrypt($request->input('password'))
            ]
        );

        $notification = "El usuario ha sido creado exitosamente";
        return redirect('/usuarios')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::users()->findOrFail($id);
        return view('users.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'phone' => 'required',
        ];
        $messages = [
            'name.required' => 'El nombre del usuario es obligatorio',
            'name.min' => 'El nombre del usuario usurio debe tener mas de 3 caracteres',
            'email.required' => 'El correo electronico es obligatorio',
            'email.email' => 'Ingresa una direccion de correo electronico valido',
            'cedula.required' => 'La cedula es obligatoria',
            'cedula.digits' => 'La cedula debe tener 10 digitos',
            'phone.email' => 'El numero de telefono es obligatorio',
        ];
        
        $this->validate($request, $rules, $messages);
        $user = User::users()->findOrFail($id);

        $data = $request->only('name', 'email', 'cedula', 'phone');
        $password =$request->input('password');

        if($password)
            $data['password'] = bcrypt($password);
        $user->fill($data);
        $user->save();

        $notification = "La informacion del usuario se ha cambiado correctamente.";
        return redirect('/usuarios')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::users()->findOrFail($id);
        $userName = $user->name;
        $user->delete();

        $notification = "El usuario $userName se elimino correctamente";

        return redirect('/usuarios')->with(compact('notification'));
    }
}
