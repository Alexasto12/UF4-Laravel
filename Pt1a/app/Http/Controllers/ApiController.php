<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Llibre;
use App\Models\Autor;

class ApiController extends Controller
{
  function createLlibre (Request $request) {
    $llibre = Llibre::create($request->all());
    return $llibre;
  }
  function getLlibres () {
    return Llibre::all();
 }
 function getLlibre ($id) {
    return Llibre::find($id);
 }
 function updateLlibre (Request $request, $id) {
    //cal posar en la peticio PUT el Header field:
    //Content-Type = application/x-www-form-urlencoded
    $llibre = Llibre::find($id);
    $llibre->update($request->all());

    return $llibre;
  }
  
  function deleteLlibre ($id) {
    $llibre = Llibre::find($id);
    $llibre->delete();
    return $llibre;
  }

  function createAutor (Request $request) {
    $autor = Autor::create($request->all());
    return $autor;
  }

      function getAutors () {
        return Autor::all();
      }

      function getAutor ($id) {
        return Autor::find($id);
      }

      function updateAutor (Request $request, $id) {
        //cal posar en la peticio PUT el Header field:
        //Content-Type = application/x-www-form-urlencoded
        $autor = Autor::find($id);
        $autor->update($request->all());
  
        return $autor;
      }

      function deleteAutor ($id) {
        $autor = Autor::find($id);
        $autor->delete();
        return $autor;
      }
}
