<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash; // Incriptar la contraseña

class UserController extends Controller
{
    public function index(){
        $usuarios = User::with('role')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        // Obtener los roles para el combo seleccionable
        $roles = Role::all();
        // Devolver la vista de creación de usuarios con los roles disponibles
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'nombres'   => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'teléfono'  => 'required|string|max:15',
                'email'     => 'required|string|max:255|unique:users',
                'rol_id'    => 'required|integer',
                'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('fotos', 'public');
            }

            User::create([
                'nombres'   => $request->nombres,
                'apellidos' => $request->apellidos,
                'teléfono'  => $request->teléfono,
                'email'     => $request->email,
                'rol_id'    => $request->rol_id,
                'password'  => Hash::make('password'),
                'foto'      => $fotoPath,
            ]);

            return redirect()->route('usuarios.index')->with('success', 'Registro Creado Correctamente');
        } catch (\Exception $e) {
            return redirect()->route('usuarios.index')->with('error', 'Hubo un problema al crear el registro: ' . $e->getMessage());
        }
    }

    public function edit($id){
        $usuario = User::findOrFail($id);
        $roles = Role::all();

        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'teléfono'  => 'required|string|max:15',
            'email'     => 'required|string|email|max:255|unique:users,email,' .$id,
            'rol_id'    => 'required|integer',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $usuario = User::findOrFail($id);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public');
            $usuario->foto = $fotoPath;
        }

        $usuario->update([
            'nombres'   => $request->nombres,
            'apellidos' => $request->apellidos,
            'teléfono'  => $request->teléfono,
            'email'     => $request->email,
            'rol_id'    => $request->rol_id,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Registro Actualizado Correctamente');
    }

    public function destroy($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Registro Eliminado Correctamente');
    }
}
