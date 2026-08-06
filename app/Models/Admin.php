<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     */
    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'password', 'reset_token', 'reset_token_created_at'];
    protected $hidden = ['password', 'remember_token', 'reset_token'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'reset_token_created_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

