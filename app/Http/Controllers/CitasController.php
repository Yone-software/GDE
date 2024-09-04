<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

class CitasController extends Controller
{
    public function actuallyUpdate(Cita $cita, Request $request) {
        $campos = $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'nullable',
            'telefono' => 'nullable',
            'email' => 'nullable',
            'nivel_estudios' => 'required',
            'fechayhora_cita' => 'required'
        ]);

        $campos['nombre'] = strip_tags($campos['nombre']);
        $campos['apellido_paterno'] = strip_tags($campos['apellido_paterno']);
        $campos['apellido_materno'] = strip_tags($campos['apellido_materno']);
        $campos['telefono'] = strip_tags($campos['telefono']);
        $campos['email'] = strip_tags($campos['email']);
        $campos['nivel_estudios'] = strip_tags($campos['nivel_estudios']);
        $campos['fechayhora_cita'] = strip_tags($campos['fechayhora_cita']);

        $cita->update($campos);

        return back()->with('success', 'La cita ha sido actualizada.');

    }

    public function showEditForm(Cita $cita) {
        return view('editar-cita', ['cita' => $cita]);
    }

    public function delete(Cita $cita) {
        $cita->delete();
        return redirect('/')->with('success', 'Cita exitosamente borrada.');
    }

    public function viewCita(Cita $cita) {
        return view('info-cita', ['cita' => $cita]);
    }

    public function storeNewAppointment(Request $request) {
        
        $request->validate([
            'cv' => 'required|mimes:pdf|max:30720', 
        ]);
        
        $file = $request->file('cv');
        $uniqueName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/cvs/', $uniqueName);
        
        $campos = $request->validate([
            'nombre' => 'required|min:3',
            'apellido_paterno' => 'required|min:3',
            'apellido_materno' => 'nullable|min:3',
            'telefono' => 'nullable|numeric',
            'email' => 'nullable|email',
            'nivel_estudios' => 'required',
            'cv_id',
            'fechayhora_cita' => 'required'
        ]);

        $campos['cv_id'] = $uniqueName;
        $campos['nombre'] = strip_tags($campos['nombre']);
        $campos['apellido_paterno'] = strip_tags($campos['apellido_paterno']);
        $campos['apellido_materno'] = strip_tags($campos['apellido_materno']);
        $campos['telefono'] = strip_tags($campos['telefono']);
        $campos['email'] = strip_tags($campos['email']);
        $campos['nivel_estudios'] = strip_tags($campos['nivel_estudios']);
        $campos['fechayhora_cita'] = strip_tags($campos['fechayhora_cita']);

        $campos['user_id'] = auth()->id();

        Cita::create($campos);

        return redirect('/')->with('success', 'La nueva cita ha sido creada exitosamente.');
    }

    public function showCreateForm() {
        return view('crear-cita');
    }

    public function showCorrectIndex(Request $request) {
            if (auth()->check()) {
            $user = $request->user(); 
            return view('index', ['username' => $user->username, 'citas' => $user->citas()->latest()->paginate('10')]);
        } else {
            return view('homepage-guests');
        }
    }

    public function store(Request $request) {
        $campos = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'password' => ['required', 'min:6', 'confirmed']
        ]);

        $campos['password'] = bcrypt($campos['password']); 

        $user = User::create($campos);
        auth()->login($user);
        return redirect('/')->with('success', 'Cuenta creada con exito');
    }
}
