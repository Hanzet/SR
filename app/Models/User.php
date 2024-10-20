<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens; // HasApiTokens,
use Illuminate\Database\Eloquent\SoftDeletes; // Agregar la liberia de softdeletes para eliminar los registros logicos de la tabla users (usuario)

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $dates = ['deleted_at'];

    // Campos que son rellenables
    protected $fillable = [
        'nombres',
        'apellidos',
        'teléfono',
        'foto',
        'email',
        'password',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id'); // belongsTo es uno a uno
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'user_id'); // hasMany es uno a muchos
    }

    public function consultantReservations()
    {
        return $this->hasMany(Reservation::class, 'consultant_id'); // hasMany es uno a muchos
    }
}
