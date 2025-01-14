<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;


use App\Models\Llibre;
use App\Models\Autor;

class LlibreController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function list()
    {
        $llibres = Llibre::all();

        return view('llibre.list', ['llibres' => $llibres]);
    }

    function new(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'titol' => 'required|max:10',
                'vendes' => 'required|numeric | max:15000000',
                'dataP' => 'required|date | after:today',
            ], [
                'titol.required' => 'El camp títol és obligatori.',
                'titol.max' => 'El camp títol no pot tenir més de 10 caràcters.',
                'vendes.required' => 'El camp vendes és obligatori.',
                'vendes.numeric' => 'El camp vendes ha de ser un número.',
                'vendes.max' => 'El camp vendes no pot ser més gran de 15.000.000.',
                'dataP.required' => 'El camp data de publicació és obligatori.',
                'dataP.date' => 'El camp data de publicació ha de ser una data vàlida.',
                'dataP.after' => 'El camp data de publicació ha de ser una data anterior a avui.',
            ]);

            $llibre = new Llibre;
            $llibre->titol = $request->titol;
            $llibre->dataP = $request->dataP;
            $llibre->vendes = $request->vendes;
            $llibre->autor_id = $request->autor_id;
            $llibre->save();
            
            if ($request->autor_id != null){
                
                return redirect()->route('llibre_list')->with('status', 'Llibre ' . $llibre->titol . ' actualitzat!')->cookie('autor', $request->autor_id, 60);
            }else{

                return redirect()->route('llibre_list')->with('status', 'Llibre ' . $llibre->titol . ' actualitzat!')->withoutCookie('autor');
            }
        }
        // si no venim de fer submit al formulari, hem de mostrar el formulari

        $autors = Autor::all();

        return view('llibre.new', ['autors' => $autors]);
    }

    function delete($id)
    {
        $llibre = Llibre::find($id);
        $llibre->delete();

        return redirect()->route('llibre_list')->with('status', 'Llibre ' . $llibre->titol . ' eliminat!');
    }
    function edit(Request $request,$id)
    {
        /* $request = new Request(); */
        
        if ($request->isMethod('post')) {
            $request->validate([
                'titol' => 'required|max:10',
                'vendes' => 'required|numeric | max:15000000',
                'dataP' => 'required|date | after:today',
            ], [
                'titol.required' => 'El camp títol és obligatori.',
                'titol.max' => 'El camp títol no pot tenir més de 10 caràcters.',
                'vendes.required' => 'El camp vendes és obligatori.',
                'vendes.numeric' => 'El camp vendes ha de ser un número.',
                'vendes.max' => 'El camp vendes no pot ser més gran de 15.000.000.',
                'dataP.required' => 'El camp data de publicació és obligatori.',
                'dataP.date' => 'El camp data de publicació ha de ser una data vàlida.',
                'dataP.after' => 'El camp data de publicació ha de ser una data anterior a avui.',
            ]);   /* Hi ha una forma amb el transalte() pero no la he pogut fer funcionar */
            $llibre = Llibre::find($id);
           // dd($request);
            $llibre->titol = $request->titol;
            $llibre->dataP = $request->dataP;
            $llibre->vendes = $request->vendes;
            $llibre->autor_id = $request->autor_id;
            $llibre->save();
            
            
        }
        
        $llibre = Llibre::find($id); 
        $autors = Autor::all();

        return view('llibre.edit', ['autors' => $autors],['llibre' => $llibre]);
    }
   function  crearCookie($autor_id){
    return response('autorID')->cookie(
        'autor', $autor_id, 6000
    );

   }
}