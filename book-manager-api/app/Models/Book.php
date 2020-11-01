<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'author',
        'status',
        'user_borrow',
        'publication_date',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
