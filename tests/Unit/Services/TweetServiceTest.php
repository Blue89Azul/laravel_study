<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Services\TweetService;
use Mockery;

/**
 * @runInSeparateProcess
 * @return void
 */
class TweetServiceTest extends TestCase
{
    public function test_check_own_tweet()
    {
        $tweetService = new TweetService();

        /**
         * checkOwnTweet内部でDBアクセスが行われているため、
         * モックで対応する
         */
        $mock = Mockery::mock('alias:App\Models\Tweet');
        $mock->shouldReceive('where->first')->andReturn((object)[
            'id'      => 1,
            'user_id' => 1,
        ]);
        
        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);

        $result = $tweetService->checkOwnTweet(2, 1);
        $this->assertFalse($result);
    }
}
