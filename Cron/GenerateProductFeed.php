<?php
declare(strict_types=1);

namespace HK2\MarketingAnalytics\Cron;

use HK2\MarketingAnalytics\Model\Feed\Google;

class GenerateProductFeed
{
    public function __construct(
        private Google $googleFeed
    ) {}

    public function execute(): void
    {
        $this->googleFeed->generate();
    }
}
