<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingridients';

    //public $timestamps = false;

    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
      'name',
      'measure'
    ];
    
    public function quantities() {
      return $this->hasMany(Quantity::class, 'id');
    }
}
