<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function posts()
    {
        // hasMany() su usa nel model che NON ha la key esterna, in una relazione uno a molti
        // hasOne() su usa nel model che NON ha la key esterna, in una relazione uno a uno
        return $this->hasMany(Post::class);
    }
}
