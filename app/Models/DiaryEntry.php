<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryEntry extends Model
{
    use HasFactory;

    protected $attributes = [
        'active' => 1,
    ];

    protected $fillable = [
        'diary_id',
        'subject',
        'food_id',
        'notes',
        'entry_date',
    ];

    protected $casts = [
        'entry_date' => 'date',
        'active' => 'boolean'
    ];

    // Model Functions

    public function storeDiaryEntry()
    {
        $data = request();

        $this->diary_id = $data->diary_id;
        $this->subject = $data->subject;
        $this->food_id = $data->food_id;
        $this->notes = $data->notes;
        $this->entry_date = $data->entry_date;
        $this->active = 1;

        $this->save();
    }

    public function updateDiaryEntry()
    {
        $data = request();

        $this->subject = $data->subject ?? $this->subject;
        $this->food_id = $data->food_id ?? $this->food_id;
        $this->notes = $data->notes ?? $this->notes;
        $this->entry_date = $data->entry_date ?? $this->entry_date;

        $this->save();
    }

    public function deleteDiaryEntry()
    {
        $this->active = 0;
        $this->save();
    }

    public function restoreDiaryEntry()
    {
        $this->active = 1;
        $this->save();
    }
}
