<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;


class Team extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name','slug', 'email', 'address', 'contact_no', 'image', 'position', 'active', 'facebook', 'instagram'
    ];
    public function contact()
    {
        return $this->hasMany(Contact::class, 'team_id', 'id');
    }
}
