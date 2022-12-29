<?php

namespace App\Services;

use App\Models\Tweet;

class TweetService
{
    public function getTweets()
    {
        return Tweet::with('images')->orderBy('created_at', 'DESC')->get();
    }

    /**
     * @brief 自分のツイートかどうかをチェックする
     */
    public function checkOwnTweet(int $userId, int $tweetId): bool
    {
        $tweet = Tweet::where('id', $tweetId)->first();
        if (!$tweet) {
            return false;
        }

        return $tweet->user_id === $userId;
    }

    public function countYesterdayTweets()
    {
        return Tweet::whereDate('created_at', '>=', Carbon::yesterday()->toDateTimeString())
        ->whereDate('created_at', '<', Carbon::today()->toDateTimeString())
        ->count();
    }
}