<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodAllergen extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'allergen_id',
    ];

    // Model Functions

    public function storeFoodAllergen() 
    {
        $data = request();

        $this->food_id = $data->food_id;
        $this->allergen_id = $data->allergen_id;

        $this->save();
    }
}
