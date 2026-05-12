<?php
declare(strict_types=1);

namespace HK2\MarketingAnalytics\Block;

use Magento\Framework\View\Element\Template;
use HK2\MarketingAnalytics\Helper\Data;

class Pixel extends Template
{
    private Data $helper;

    public function __construct(
        Template\Context $context,
        Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }

    public function isEnabled()
    {
        return $this->helper->isEnabled();
    }

    public function getGaId()
    {
        return $this->helper->getGaId();
    }

    public function getFacebookPixelId()
    {
        return $this->helper->getFacebookPixelId();
    }
}
