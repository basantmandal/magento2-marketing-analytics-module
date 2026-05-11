<?php
declare(strict_types=1);

namespace HK2\MarketingAnalytics\Model\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class SupportLink extends Field
{
    /**
     * @var string
     */
    protected $_template = 'HK2_MarketingAnalytics::system/config/support_link.phtml';

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        return $this->_toHtml();
    }

    /**
     * @return string
     */
    public function getSupportUrl(): string
    {
        return 'https://www.basantmandal.in/support';
    }
}