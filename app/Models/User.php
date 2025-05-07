<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Chave primária associada à tabela.
     *
     * @var string
     */
    protected $primaryKey = 'cpf';

    /**
     * Campo primário não é auto-incrementado.
     *
     * @var bool
     */
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'cpf',
        'name',
        'email',
        'phone_number',
        'street',
        'number',
        'district',
        'city',
        'state',
        'zip_code',
    ];
  
    public function getRouteKeyName()
    {
        return 'cpf';
    }
    public function address()
{
    return $this->hasOne(Address::class, 'user_cpf', 'cpf');
}


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
