<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    public $timetstamps = false;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    //public $timestamps = false;

    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
      'name',
      'description',
      'instructions',
      'img'
    ];

    public function ingredients() {
      return $this->hasMany(Quantity::class, 'recipe_id');
    }
}
