<?php
declare(strict_types=1);

namespace HK2\MarketingAnalytics\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Data
{
    public const XML_PATH = 'hk2_marketingAnalytics_section1/hk2_marketinganalytics_section1_group2/';

    public function __construct(
        private ScopeConfigInterface $scopeConfig
    ) {}

    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH.'enable', ScopeInterface::SCOPE_STORE);
    }

    public function getGaId(): ?string
    {
        return $this->scopeConfig->getValue(self::XML_PATH.'google_analytics_id', ScopeInterface::SCOPE_STORE);
    }

    public function getFacebookPixelId(): ?string
    {
        return $this->scopeConfig->getValue(self::XML_PATH.'facebook_pixel_id', ScopeInterface::SCOPE_STORE);
    }
}
