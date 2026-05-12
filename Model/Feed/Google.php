<?php
declare(strict_types=1);

namespace HK2\MarketingAnalytics\Model\Feed;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;

class Google
{
    public function __construct(
        private Filesystem $filesystem
    ) {}

    public function generate(): void
    {
        $directory = $this->filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        $directory->create('export');
        $xmlContent = '<?xml version="1.0" encoding="UTF-8"?><rss version="2.0" xmlns:g="http://base.google.com/ns/1.0"><channel><title>Google Product Feed</title></channel></rss>';
        $directory->writeFile('export/google_products.xml', $xmlContent);
    }
}
