<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client ::all();
        return $clients ;
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clients = new Client ([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'num_tel' => $request->input('num_tel'),
            'ville' => $request->input('ville'),

        ]);
        $clients->save();
        return response()->json($clients, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $client = Client::find($id);
    return response()->json($client);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->update($request->all());
        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $clients = Client::find($id);
        $clients->delete();
        return response()->json('Client supprimée !');
    }
}
