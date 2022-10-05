<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userDriverModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'firstName', 
        'lastName',
        'email',
        'password',
        'age',
        'gender',
        'contactNumber',
        'license',
        'birthCertificate',
        'vehicleType'
    ];
}
