<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'price', 'description', 'image', 'url', 'created_date', 'updated_date'];
    public $timestamps = false;

    public function getProduct($idProduct)
    {
        $data = DB::table('product')
            ->where('id', '=', $idProduct)
            ->select('*')
            ->get();

        return $data;
    }

    public function getListAllProduct()
    {
        $data = DB::table('product')
            ->orderBy('updated_date', 'DESC')
            ->orderBy('created_date', 'DESC')
            ->select('*')
            ->get();

        return $data;
    }
}