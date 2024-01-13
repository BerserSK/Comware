<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Http\Controllers\Controller;


class TemplateController extends Controller
{
    public function index(){
        $templates = Template::all();
        return view('templates.index', compact('templates'));
    }

    public function create(){
        return view('templates.create');
    }

    public function sendData(Request $request){
        $rules = [
            'name' => 'required|min:3'
        ];

        $message = [
            'name.required' => 'El nombre de la plantilla es obligatorio',
            'name.min' => 'El nombre de la plantilla debe tener mas de 3 caracteres'
        ];

        $this->validate($request, $rules, $message);

        $template = new Template();
        $template->name = $request->input('name');
        $template->description = $request->input('description');
        $template->plantilla = $request->input('plantilla');
        $template->save();
        $notification = "La plantilla se ha creado correctamente";
        
        return redirect('/plantillas')->with(compact('notification'));
    }

    public function edit(Template $template){
        return view('templates.edit', compact('template'));
    }

    public function update(Request $request, Template $template){
        $rules = [
            'name' => 'required|min:3'
        ];

        $message = [
            'name.required' => 'El nombre de la plantilla es obligatorio',
            'name.min' => 'El nombre de la plantilla debe tener mas de 3 caracteres'
        ];

        $this->validate($request, $rules, $message);

        $template->name = $request->input('name');
        $template->description = $request->input('description');
        $template->plantilla = $request->input('plantilla');
        $template->save();
        
        $notification = "La plantilla se ha actualizado correctamente";

        return redirect('/plantillas')->with(compact('notification'));
    }

    public function destroy(Template $template){
        $deleteName = $template->name;

        $template->delete();

        $notification = "La especialidad ". $deleteName ." se ha eliminado correctamente";

        return redirect('/plantillas')->with(compact('notification'));
    }
}
