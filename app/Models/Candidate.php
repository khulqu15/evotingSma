<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    public function voters()
    {
        return $this->hasMany(Voters::class, 'vote_id', 'id');
    }
}
