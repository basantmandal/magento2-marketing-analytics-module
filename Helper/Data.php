<?php
namespace HK2\MarketingAnalytics\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH = 'hk2_marketinganalytics/general/';

    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH.'enable', ScopeInterface::SCOPE_STORE);
    }

    public function getGaId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH.'google_analytics_id', ScopeInterface::SCOPE_STORE);
    }

    public function getFacebookPixelId()
    {
        return $this->scopeConfig->getValue(self::XML_PATH.'facebook_pixel_id', ScopeInterface::SCOPE_STORE);
    }
}
