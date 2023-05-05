<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    protected $table = 'quantities';

    public $timetstamps = false;
    const UPDATED_AT = null;
    const CREATED_AT = null;
    //public $timestamps = false;

    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
      'quantity',
      'recipe_id',
      'ingredient_id'
    ];

    public function ingredient() {
      return $this->belongsTo(Ingredient::class);
    }

    public function recipe() {
      return $this->belongsTo(Recipe::class);
    }
}
