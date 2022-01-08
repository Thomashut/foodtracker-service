<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $attributes = [
        'active' => 0
    ];

    protected $fillable = [
        'name',
        'description',
        'notes',
        'created_by',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    // Model Functions

    public function storeFood()
    {
        $data = request();
        
        $this->name = $request->name;
        $this->description = $request->description;
        $this->notes = $request->notes;
        $this->created_by = $request->created_by;
        $this->active = $request->active ?? 1;

        $this->save();
    }

    public function updateFood()
    {
        $data = request();

        $this->name = $request->name ?? $this->name;
        $this->description = $request->description ?? $this->description;
        $this->notes = $request->notes ?? $this->notes;
        $this->created_by = $request->created_by ?? $this->created_by;
        $this->active = $request->active ?? $this->active;

        $this->save();
    }

    public function deleteFood()
    {
        $this->active = 0;

        $this->save();
    }

    public function restoreFood()
    {
        $this->active = 1;

        $this->save();
    }
}
