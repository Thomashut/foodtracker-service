<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodInfo extends Model
{
    use HasFactory;

    protected $attributes = [
        'active' => 0
    ];

    protected $fillable = [
        'detail',
        'avg_portion',
        'calories',
        'protien',
        'sugars',
        'fat',
        'salt',
        'avg_price'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    // Model Functions

    public function storeFoodInfo()
    {
        $data = request();

        $this->food_id = $data->food_id;
        $this->detail = $data->detail;
        $this->avg_portion = $data->avg_portion;
        $this->calories = $data->calories;
        $this->protien = $data->protien;
        $this->sugars = $data->sugars;
        $this->fat = $data->fat;
        $this->salt = $data->salt;
        $this->avg_price = $data->avg_price;
        $this->active = 1;

        $this->save();
    }

    public function updateFoodInfo()
    {
        $data = request();

        $this->detail = $data->detail ?? $this->detail;
        $this->avg_portion = $data->avg_portion ?? $this->avg_portion;
        $this->calories = $data->calories ?? $this->calories;
        $this->protien = $data->protien ?? $this->protien;
        $this->sugars = $data->sugars ?? $this->sugars;
        $this->fat = $data->fat ?? $this->fat;
        $this->salt = $data->salt ?? $this->salt;
        $this->avg_price = $data->avg_price ?? $this->avg_price;

        $this->save();
    }

    public function deleteFoodInfo()
    {
        $this->active = 0;

        $this->save();
    }

    public function restoreFoodInfo()
    {
        $this->active = 1;

        $this->save();
    }
}
