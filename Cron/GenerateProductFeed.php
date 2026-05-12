<?php
declare(strict_types=1);

namespace HK2\MarketingAnalytics\Cron;

use HK2\MarketingAnalytics\Helper\Data;
use HK2\MarketingAnalytics\Model\Feed\Google;

class GenerateProductFeed
{
    public function __construct(
        private Google $googleFeed,
        private Data $helper
    ) {}

    public function execute(): void
    {
        if (!$this->helper->isFeedEnabled()) {
            return;
        }

        $this->googleFeed->generate();
    }
}
