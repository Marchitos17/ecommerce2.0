<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Prodotti;

class AdminController extends Controller
{
    function mostra_categorie(){
        $data= Categoria::all();
        return view('admin.mostra_categorie',compact('data'));
    }
    function add_cat(Request $request){
         $categoria = new Categoria;
         $categoria->nome_categoria = $request->name;//dal form 
         $categoria->save();
         return redirect()->route('mostra_categorie');
    }
    public function update(Request $request, $id)
    {
        // Validazione del nome della categoria
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Trova la categoria e aggiorna il nome
        $category = Categoria::findOrFail($id);
        $category->nome_categoria = $request->input('name');
        $category->save();

        // Dopo aver aggiornato, reindirizza alla pagina con il nuovo nome
        return redirect()->back()->with('success', 'Categoria aggiornata con successo!');
    }

    public function destroy($id)
    {
        // Trova la categoria e elimina
        $category = Categoria::findOrFail($id);
        $category->delete();

        // Restituisci una risposta JSON (opzionale)
        return response()->json(['success' => true]);
    }
    function mostra_prodotti(){
        $data= Prodotti::all();
        $data1= Categoria::all();
        return view('admin.mostra_prodotti',compact('data','data1'));
    }

}
