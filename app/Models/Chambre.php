<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom','image','description','prix','disponibilite'
        ];
        public function reservations()
    {
        return $this->hasMany(Reservation::class, 'chambre_id');
    }
}
