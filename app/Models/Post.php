<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "id",
        "title",
        "content",
        "publishedAt",
        "updated_at"
    ];


    public $incrementing = false;

    /**
     * Sets the UUID value for the primary key field.
     */
    protected function setUUID()
    {
        $this->id = preg_replace('/\./', '', uniqid('bpm', true));
    }
}
