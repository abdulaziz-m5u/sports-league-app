<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }
    
    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

}
