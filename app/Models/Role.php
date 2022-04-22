<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users()
    {
        $this->belongsTo(User::class);
    }

    public function pages()
    {
        return $this->morphToMany(page::class, 'pageable');
    }

    // Custom Function Model

}
