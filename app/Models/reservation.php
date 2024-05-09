<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chambre;
use App\Models\client;



class reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'chambre_id',
        'client_id',
        'date_arrivee',
        'date_depart',
        'nombre_personnes',
    ];
    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'chambre_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
    

