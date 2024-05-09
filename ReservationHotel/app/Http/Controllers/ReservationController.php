<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Client;
use App\Models\Chambre;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Affiche une liste de ressources.
     */
    public function index()
    {
        $reservations = Reservation::with('chambre', 'client')->get();
        return response()->json($reservations);
    }

    /**
     * Affiche le formulaire de création d'une nouvelle ressource.
     */
    public function create()
    {
        $chambres = Chambre::all();
        $clients = Client::all();

        return response()->json([
            'chambres' => $chambres,
            'clients' => $clients
        ]);
    }

    /**
     * Stocke une nouvelle ressource dans le stockage.
     */
    public function store(Request $request)
    {
        $reservation = new Reservation([
            'chambre_id' => $request->input('chambre_id'),
            'client_id' => $request->input('client_id'),
            'date_arrivee' => $request->input('date_arrivee'),
            'date_depart' => $request->input('date_depart'),
            'nombre_personnes' => $request->input('nombre_personnes'),
        ]);
        $reservation->save();
        return response()->json($reservation, 201);
    }

    /**
     * Affiche la ressource spécifiée.
     */
    public function show(Reservation $reservation)
    {
        $reservation = Reservation::with('chambre', 'client')->find($reservation->id);
        return response()->json($reservation);
    }

    /**
     * Met à jour la ressource spécifiée dans le stockage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->update($request->all());
        return response()->json($reservation, 200);
    }

    /**
     * Supprime la ressource spécifiée du stockage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json('Réservation supprimée !');
    }
}
