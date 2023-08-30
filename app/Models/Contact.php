<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address','team_id','team_assigned','message','subject'];

    public function team(){
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
