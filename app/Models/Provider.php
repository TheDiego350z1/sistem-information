<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /** @use HasFactory<\Database\Factories\ProviderFactory> */
    use HasFactory;

    /**
     * TODO: add validations rules for the numbers phones (e.g. regex, prefixes, etc.)
     */

    protected $talbe = 'providers';

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'description',
    ];
}
