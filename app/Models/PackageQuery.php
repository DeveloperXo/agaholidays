<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Package;

class PackageQuery extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'user_id',
        'name',
        'email',
        'phone',
        'destination',
        'departure_date',
        'departure_city',
        'adult',
        'child',
        'infant',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
