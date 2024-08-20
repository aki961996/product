<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['product_name', 'description', 'price', 'is_active'];

    static public function getRecord()
    {
        $return = Product::select('*')
            ->where('available', '=', 1);
        //search
        $name = request()->get('product_name');
        $price = request()->get('price');
        if (!empty($name)) {
            $return = $return->where('product_name', 'like', '%' . $name . '%');
        }
        if (!empty($price)) {
            $return = $return->where('price', 'like', '%' . $price . '%');
        }
        //search
        $return = $return->orderBy('id', 'desc')->paginate(10);
        return $return;
    }
}
