<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Article;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Champs autorisés à l'insertion
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Champs cachés
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts automatiques
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relation : un user a plusieurs articles
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}