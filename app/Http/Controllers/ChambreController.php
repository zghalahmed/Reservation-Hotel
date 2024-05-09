<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;

class ChambreController extends Controller
{
    public function index()
    {
        $chambres = Chambre::all();
        return $chambres;
    }

    public function store(Request $request)
    {
        $chambres = new Chambre([
            'nom' => $request->input('nom'),
            'image' => $request->input('image'),

            'description' => $request->input('description'),
            'prix' => $request->input('prix'),
            'disponibilite' => $request->input('disponibilite')
        ]);
        $chambres->save();
        return response()->json($chambres, 201);
    }

    public function show($id)
    {
        $chambre = Chambre::find($id);
        return response()->json($chambre);
    }

    public function update(Request $request, $id)
    {
        $chambre = Chambre::find($id);
        $chambre->update($request->all());
        return response()->json($chambre, 200);
    }

    public function destroy($id)
    {
        $chambre = Chambre::find($id);
        $chambre->delete();
        return response()->json('Chambre supprimée !');
    }
}

