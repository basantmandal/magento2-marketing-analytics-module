<?php
declare(strict_types=1);

namespace HK2\MarketingAnalytics\Model\Feed;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\Product\Attribute\Source\Status as ProductStatus;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Store\Model\StoreManagerInterface;

class Google
{
    public function __construct(
        private Filesystem $filesystem,
        private ProductCollectionFactory $productCollectionFactory,
        private StoreManagerInterface $storeManager,
        private TimezoneInterface $timezone,
        private Visibility $visibility,
        private ProductStatus $productStatus
    ) {}

    public function generate(): void
    {
        $store = $this->storeManager->getStore();
        $baseUrl = $store->getBaseUrl();
        $locale = $this->timezone->getConfigTimezone();

        $products = $this->productCollectionFactory->create()
            ->addAttributeToSelect(['name', 'description', 'price', 'small_image'])
            ->addAttributeToFilter('status', ['in' => $this->productStatus->getVisibleStatusIds()])
            ->addAttributeToFilter('visibility', ['in' => $this->visibility->getVisibleInSiteIds()])
            ->addStoreFilter($store->getId())
            ->setPageSize(500);

        $writer = $this->filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        $writer->create('export');
        $stream = $writer->openFile('export/google_products.xml', 'w+');

        $stream->write('<?xml version="1.0" encoding="UTF-8"?>' . "\n");
        $stream->write('<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">' . "\n");
        $stream->write('<channel>' . "\n");
        $stream->write('<title><![CDATA[' . $store->getName() . ']]></title>' . "\n");
        $stream->write('<link><![CDATA[' . $baseUrl . ']]></link>' . "\n");
        $stream->write('<description><![CDATA[' . __('Google Product Feed') . ']]></description>' . "\n");

        /** @var \Magento\Catalog\Model\Product $product */
        foreach ($products as $product) {
            $imageUrl = $product->getSmallImage()
                ? $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'catalog/product' . $product->getSmallImage()
                : '';

            $stream->write('<item>' . "\n");
            $stream->write('<g:id><![CDATA[' . $product->getSku() . ']]></g:id>' . "\n");
            $stream->write('<title><![CDATA[' . $product->getName() . ']]></title>' . "\n");
            $stream->write('<description><![CDATA[' . strip_tags((string)$product->getDescription()) . ']]></description>' . "\n");
            $stream->write('<link><![CDATA[' . $product->getProductUrl() . ']]></link>' . "\n");
            if ($imageUrl) {
                $stream->write('<g:image_link><![CDATA[' . $imageUrl . ']]></g:image_link>' . "\n");
            }
            $stream->write('<g:price><![CDATA[' . sprintf('%.2F', (float)$product->getPrice()) . ' ' . $store->getCurrentCurrencyCode() . ']]></g:price>' . "\n");
            $stream->write('<g:availability><![CDATA[' . ($product->isSalable() ? 'in stock' : 'out of stock') . ']]></g:availability>' . "\n");
            $stream->write('</item>' . "\n");
        }

        $stream->write('</channel>' . "\n");
        $stream->write('</rss>' . "\n");
        $stream->close();
    }
}
