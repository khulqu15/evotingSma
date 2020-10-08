<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voters extends Model
{
    use HasFactory;

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'vote_id', 'id');
    }
}
