<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    protected $table = 'quantities';

    //public $timestamps = false;

    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
      'quantity'
    ];

    public function ingredient() {
      return $this->belongsTo(Ingredient::class);
    }

    public function recipe() {
      return $this->belongsTo(Recipe::class);
    }
}
