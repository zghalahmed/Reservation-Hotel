<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','nom','prenom','email','num_tel','ville'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'client_id');
    }
   
}
