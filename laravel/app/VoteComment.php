<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VoteComment extends Model
{
    protected $table = 'vote_comment';
    protected $fillable = ['comment_id', 'up', 'down', 'ip', 'created_date'];
    public $timestamps = false;

    public function getCountVote($commentId)
    {
        $data = DB::table('vote_comment')
            ->where('comment_id', $commentId)
            ->groupBy('comment_id')
            ->select(DB::raw('SUM(up) Up'), DB::raw('SUM(down) Down'), 'comment_id')
            ->get();

        return $data;
    }

    public function isVoted($commentId, $ip)
    {
        $data = DB::table('vote_comment')
            ->where('comment_id', $commentId)
            ->where('ip', $ip)
            ->select('comment_id', 'ip')
            ->get();

        return $data;
    }

    public function getVote($commentId, $ip)
    {
        $data = DB::table('vote_comment')
            ->where('comment_id', $commentId)
            ->where('ip', $ip)
            ->select('1')
            ->get();

        return $data;
    }
}
