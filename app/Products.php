<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'id';
    public function getPrice()
    {
        $price = $this->price / 100;
        return number_format($price,2,'' ,' ') .' CFA';
    }
}
