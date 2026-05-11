<?php
namespace HK2\MarketingAnalytics\Model\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\View\Asset\Repository;
use Magento\Framework\Module\ModuleListInterface;
use Magento\Framework\Escaper;

class ModuleHeader extends Field
{
    private Repository $assetRepo;
    private ModuleListInterface $moduleList;
    private Escaper $escaper;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        Repository $assetRepo,
        ModuleListInterface $moduleList,
        Escaper $escaper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->assetRepo  = $assetRepo;
        $this->moduleList = $moduleList;
        $this->escaper    = $escaper;
    }

    protected function _getElementHtml(AbstractElement $element): string
    {
        $logoUrl = $this->assetRepo->getUrl('HK2_MarketingAnalytics::images/logo.png');

        $module = $this->moduleList->getOne('HK2_MarketingAnalytics');
        $version = $module['setup_version'] ?? 'N/A';

        $websiteUrl = 'https://www.basantmandal.in';
        $guideUrl   = 'https://www.basantmandal.in/hk2-marketing-analytics-guide';
        $supportUrl = 'https://www.basantmandal.in/support';

        return <<<HTML
<div class="hk2-module-header">
    <div class="hk2-header-top">
        <img src="{$this->escaper->escapeUrl($logoUrl)}"
             alt="HK2 Marketing Analytics"
             class="hk2-logo"/>

        <div>
            <h2>Marketing Analytics</h2>
            <p>Version {$this->escaper->escapeHtml($version)} • Magento 2 Module</p>
        </div>
    </div>

    <div class="hk2-links">
        <a href="{$this->escaper->escapeUrl($websiteUrl)}" target="_blank">Official Website</a>
        <a href="{$this->escaper->escapeUrl($guideUrl)}" target="_blank">User Guide</a>
        <a href="{$this->escaper->escapeUrl($supportUrl)}" target="_blank">Support</a>
    </div>
</div>
HTML;
    }
}
