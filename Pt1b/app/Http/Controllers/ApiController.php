<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Llibre;
use App\Models\Autor;
use App\Models\Biblioteca;

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

      function getBibliotecas(){
        return Biblioteca::all();
      }

      function getBiblioteca($id){
        return Biblioteca::find($id);
      }

      function createBiblioteca(Request $request){
        $biblioteca = Biblioteca::create($request->all());
        return $biblioteca;
      }

      function updateBiblioteca(Request $request, $id){
        $biblioteca = Biblioteca::find($id);
        $biblioteca->update($request->all());
        return $biblioteca;
      }
      
      function deleteBiblioteca($id){
        $biblioteca = Biblioteca::find($id);
        $biblioteca->delete();
        return $biblioteca;
      }

      function addLlibreToBiblioteca($idBiblioteca, $idLlibre){
        $llibre = Llibre::find($idLlibre);
        $biblioteca = Biblioteca::find($idBiblioteca);
        $llibre->bibliotecas()->attach($biblioteca);
        return response()->json([
          'message' => 'success add',
          'biblioteca_id' => $idBiblioteca,
          'llibre_id' => $idLlibre
      ]);
      }
      function removeLlibreFromBiblioteca($idBiblioteca, $idLlibre){
        $llibre = Llibre::find($idLlibre);
        $biblioteca = Biblioteca::find($idBiblioteca);
        $llibre->bibliotecas()->detach($biblioteca);
        return response()->json([
          'message' => 'success remove',
          'biblioteca_id' => $idBiblioteca,
          'llibre_id' => $idLlibre
      ]);
      }
      function getBibliotecasFromLlibre($idLlibre){
        $llibre = Llibre::find($idLlibre);
        return $llibre->bibliotecas;
      }
}
