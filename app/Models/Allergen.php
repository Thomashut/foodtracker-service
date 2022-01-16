<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    use HasFactory;

    protected $attributes = [
        'active' => 1
    ];

    protected $fillable = [
        'allergen',
        'description',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    // Model Functions

    public function storeAllergen()
    {
        $data = request();

        $this->allergen = $data->allergen;
        $this->descrition = $data->description;
        $this->active = 1;

        $this->save();
    }

    public function updateAllergen()
    {
        $data = request();

        $this->allergen = $data->allergen ?? $this->allargen;
        $this->description = $data->description ?? $this->description;

        $this->save();
    }

    public function deleteAllergen()
    {
        $this->active = 0;
        $this->save();
    }

    public function restoreAllergen()
    {
        $this->active = 1;
        $this->save();
    }
}
