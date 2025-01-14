<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autor;
use Illuminate\Support\Facades\File;

class AutorController extends Controller
{
    public function list()
    {
        $autors = Autor::all();

        return view('autor.list', ['autors' => $autors]);
    }

    public function new(Request $request)
    {
        
        if ($request->isMethod('post')) {
            
            // Recogemos los campos del formulario en un objeto autor
            $request->validate([
                'nom' => 'required|max:10',
                'cognoms' => 'required|max:15',
            ]);
            
            $autor = new Autor;
            $autor->nom = $request->nom;
            $autor->cognoms = $request->cognoms;
            if($request->file('imatge')){
                $file = $request->file('imatge');
                $nomCognoms = str_replace(' ', '', $autor->nomCognoms());
                $filename = $nomCognoms.".".$file->extension();//guardem en una variable $filename el nom que posarem al fitxer
                $file->move(public_path(env('RUTA_IMATGES')), $filename);
                $autor->imatge = $filename;
              }
            $autor->save();

            return redirect()->route('autor_list')->with('status', 'Nou autor ' . $autor->nom . ' ' . $autor->cognoms . ' creat!');
        }
        // Si no venimos de hacer submit al formulario, mostramos el formulario

        return view('autor.new');
    }

    public function delete($id)
    {
        $autor = Autor::find($id);
        if ($autor) {
            $autor->delete();
            return redirect()->route('autor_list')->with('status', 'Autor eliminat!');
        }

        return redirect()->route('autor_list')->with('error', 'Autor no trobat!');
    }
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'nom' => 'required|max:10',
                'cognoms' => 'required|max:15',
            ]);
            $autor = Autor::find($id);
            $autor->nom = $request->nom;
            $autor->cognoms = $request->cognoms;
            $nomCognoms = str_replace(' ', '', $autor->nomCognoms());
            if($request->file('imatge')){
                $file = $request->file('imatge');
                $filename = $nomCognoms.".".$file->extension();//guardem en una variable $filename el nom que posarem al fitxer
                $file->move(public_path(env('RUTA_IMATGES')), $filename);
                $autor->imatge = $filename;
              
              }else{
                  $autor->imatge = null;
                  $files = File::glob(public_path(env('RUTA_IMATGES')).$nomCognoms.".*");

                  // Eliminar cada archivo encontrado
                  foreach ($files as $file) {
                      File::delete($file);
                  }
                }
            
            $autor->save();
            return redirect()->route('autor_list')->with('status', 'Autor ' . $autor->nom . ' ' . $autor->cognoms . ' actualitzat!');
        }

        $autor = Autor::find($id);

        return view('autor.edit', ['autor' => $autor]);
    }
}