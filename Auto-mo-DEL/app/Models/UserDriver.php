<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDriver extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'address',
        'password',
        'age',
        'gender',
        'contactNumber',
        'license',
        'birthCertificate',
        'vehicleType',
    ];

    public function setVehicleType($value)
    {
        $this->attributes['vehicleType'] = json_encode($value);
    }

    public function getVehicleType($value)
    {
        return $this->attributes['vehicleType'] = json_decode($value);
    }
}
