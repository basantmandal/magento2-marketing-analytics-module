<?php
namespace HK2\MarketingAnalytics\Cron;

use HK2\MarketingAnalytics\Model\Feed\Google;

class GenerateProductFeed
{
    protected $googleFeed;

    public function __construct(Google $googleFeed)
    {
        $this->googleFeed = $googleFeed;
    }

    public function execute()
    {
        $this->googleFeed->generate();
    }
}
