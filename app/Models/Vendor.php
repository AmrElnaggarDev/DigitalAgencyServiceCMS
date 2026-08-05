<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Vendor extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     */
    protected $table = 'vendors';

    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'verification_token', 'verification_token_created_at',
        'reset_token', 'reset_token_created_at'
    ];
    protected $hidden = ['password', 'remember_token', 'verification_token', 'reset_token'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'verification_token_created_at' => 'datetime',
            'reset_token_created_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

