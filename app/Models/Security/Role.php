<?php

namespace App\Models\Security;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description', 'full_access'
    ];

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
