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

    public function getListAllCommentWithVote($idProduct, $ip)
    {
        $data = DB::select("SELECT c.*,
                       IFNULL(vc.Up,0) Up, 
                       IFNULL(vc.Down,0) Down, 
                       CASE WHEN ip.comment_id IS NULL THEN '0'
                       ELSE '1'
                       END IsIpExist
                FROM COMMENT c
                LEFT JOIN 
                (
                    SELECT SUM(up) Up,SUM(down) Down, comment_id
                    FROM vote_comment
                    GROUP BY comment_id
                ) vc ON c.id=vc.comment_id
                LEFT JOIN vote_comment ip ON c.id=ip.comment_id
                AND ip.ip='127.0.0.1'
                WHERE product_id=416");

        return $data;
    }
}
