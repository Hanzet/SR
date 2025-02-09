<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens; // HasApiTokens,
use Illuminate\Database\Eloquent\SoftDeletes; // Agregar la liberia de softdeletes para eliminar los registros logicos de la tabla users (usuario)

// Se ejecuta para este modelo un seeder llamado UsersTableSeeder.php

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use SoftDeletes; // Usa la librería de SoftDeletes

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $dates = ['deleted_at']; // Primer dato a utilizar

    // Campos que son rellenables en la tabla Users
    protected $fillable = [
        'nombres',
        'apellidos',
        'teléfono',
        'rol_id',
        'email',
        'foto',
        'password',
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
