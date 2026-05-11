# Installation

## Prerequisites

- Magento 2.4.x (Open Source or Adobe Commerce)
- PHP 8.1 or higher
- Composer installed
- `hk2/core` package (resolved automatically by Composer)

## Composer Installation

```bash
composer require hk2/module-marketing-analytics
```

## Enable the Module

After installation, run the following Magento CLI commands:

```bash
bin/magento module:enable HK2_MarketingAnalytics
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

## Verify Installation

1. Log in to the Magento Admin Panel
2. Navigate to **Stores > Configuration > HK2 > Marketing Analytics**
3. Confirm the configuration section is visible

## Production Deployment

For production environments, ensure you run compilation and static content deployment:

```bash
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

## Uninstall

To remove the module:

```bash
bin/magento module:disable HK2_MarketingAnalytics
composer remove hk2/module-marketing-analytics
bin/magento setup:upgrade
bin/magento cache:flush
```
