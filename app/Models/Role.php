<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Se ejecuta para este modelo un seeder llamado RolesTableSeeder.php

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relación con la tabla users (Usuarios)

    public function users()
    {
        return $this->hasMany(User::class, 'rol_id'); // hasMany es uno a muchos
    }
}
