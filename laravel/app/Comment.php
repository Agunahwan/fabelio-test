<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'product_id', 'title', 'comment', 'created_date'];
    public $timestamps = false;

    public function getListAllComment($idProduct)
    {
        $data = DB::table('comment')
            ->where('product_id', '=', $idProduct)
            ->orderBy('created_date', 'DESC')
            ->select('*')
            ->get();

        return $data;
    }
}
