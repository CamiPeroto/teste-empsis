<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street',
        'number',
        'district',
        'city',
        'zip_code',
        'state',
        'user_cpf'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_cpf', 'cpf');
    }
    public function stateRelation()
    {
    return $this->belongsTo(State::class, 'state', 'uf');
    }
    
}
