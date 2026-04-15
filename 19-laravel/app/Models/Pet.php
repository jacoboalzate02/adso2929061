<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'kind',
        'weight',
        'age',
        'breed',
        'location',
        'description',
        'active',
        'adopted',
    ];

    // Relationships
    public function adoptions()
    {
        return $this->hasOne(Adoption::class);
    }

    // Scope de búsqueda (requerido por PetController::search)
    public function scopeNames($query, $q)
    {
        if (trim($q)) {
            $query->where('name', 'LIKE', "%$q%")
                  ->orWhere('kind', 'LIKE', "%$q%")
                  ->orWhere('breed', 'LIKE', "%$q%");
        }
    }
}