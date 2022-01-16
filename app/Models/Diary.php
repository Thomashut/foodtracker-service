<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $attributes = [
        'active' => 1
    ];

    protected $fillable = [
        'subject',
        'description',
        'start',
        'end',
        'goal',
        'created_by',
    ];

    protected $casts = [
        'start' => 'date',
        'end' => 'end',
        'active' => 'boolean',
    ];

    // Model Functions

    public function storeDiary()
    {
        $data = request();

        $this->subject = $data->subject;
        $this->description = $data->description;
        $this->start = $data->start;
        $this->end = $data->end;
        $this->goal = $data->goal;
        $this->active = 1;
        $this->created_by = $data->created_by;

        $this->save();
    }

    public function updateDiary()
    {
        $data = request();

        $this->subject = $data->subject ?? $this->subject;
        $this->descrition = $data->description ?? $this->description;
        $this->start = $data->start ?? $this->start;
        $this->end = $data-end ?? $this->end;
        $this->goal = $data->goal ?? $this->goal;

        $this->save();
    }

    public function deleteDiary()
    {
        $this->active = 0;
        $this->save();
    }

    public function restoreDiary()
    {
        $this->active = 1;
        $this->save();
    }
}
