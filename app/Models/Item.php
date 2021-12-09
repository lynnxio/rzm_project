<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Category;

/**
 *
 * @package App\Models
 */
class Item extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->hasOne(Status::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function getAll()
    {
        return $this->all();
    }
}
