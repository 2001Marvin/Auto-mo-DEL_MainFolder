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
        'formLicense',
        'formBirthCertificate',
    ];
}
