<?php

namespace App\Http\Controllers;

use App\VoteComment;

class VoteCommentController extends Controller
{
    public function vote($commentId, $isUp)
    {
        try {
            $ip = $this->get_client_ip();
            $vote = new VoteComment();

            $dataExists = $vote->getVote($commentId, $ip);
            if (count($dataExists) == 0) {
                $vote->comment_id = $commentId;

                if ($isUp == 1) {
                    $vote->up = 1;
                    $vote->down = 0;
                } else {
                    $vote->up = 0;
                    $vote->down = 1;
                }
                $vote->ip = $ip;
                $vote->created_date = date('Y-m-d H:i:s');

                $result = $vote->save();
            } else {
                if ($isUp == 1) {
                    $result = VoteComment::where('comment_id', $commentId)
                        ->where('ip', $ip)
                        ->update(
                            ['up' => 1],
                            ['down' => 0]
                        );
                } else {
                    $result = VoteComment::where('comment_id', $commentId)
                        ->where('ip', $ip)
                        ->update(
                            ['up' => 0],
                            ['down' => 1]
                        );
                }
            }

            echo json_encode($result);
        } catch (\Illuminate\Database\QueryException $ex) {
            echo $ex;
        }
    }

    public function getCountVote($commentId)
    {
        try {
            $vote = new VoteComment();

            $result = $vote->getCountVote($commentId);

            echo json_encode($result);
        } catch (\Illuminate\Database\QueryException $ex) {
            echo $ex;
        }
    }

    public function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }
}
