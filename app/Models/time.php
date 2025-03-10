<?php

namespace App\Models;

use App\Models\day;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class time extends Model
{
    use HasFactory;
    protected $fillable = ['section_id', 'day_id', 'time'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function day()
    {
        return $this->belongsTo(day::class);
    }
}
