<p align="center">
<img src="https://img.shields.io/badge/version-2.0.0-blue?style=flat-square" alt="Version">
<img src="https://img.shields.io/badge/Magento-2.4.x-f97316?style=flat-square&logo=magento&logoColor=white" alt="Magento">
<img src="https://img.shields.io/badge/PHP-8.2%2B-7c3aed?style=flat-square&logo=php&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/license-OSL--3.0-green?style=flat-square" alt="License">
<a href="https://packagist.org/packages/hk2/marketing-analytics">
    <img src="https://img.shields.io/packagist/dt/hk2/marketing-analytics?style=flat-square" alt="Packagist">
</a>
<br>
<a href="https://www.basantmandal.in">
    <img src="https://img.shields.io/badge/Website-000?style=flat-square&logo=ko-fi&logoColor=white" alt="Website">
</a>
<a href="https://www.linkedin.com/in/basantmandal/">
    <img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=flat-square&logo=linkedin&logoColor=white" alt="LinkedIn">
</a>
<a href="mailto:support@basantmandal.in">
    <img src="https://img.shields.io/badge/Email-support%40basantmandal.in-blue?style=flat-square&logo=gmail" alt="Email">
</a>
</p>
---

# HK2 Marketing Analytics

## Overview

HK2 Marketing Analytics integrates Google Analytics 4 (GA4), Facebook (Meta) Pixel, and Google Product Feed generation into your Magento 2 store. It provides a centralized configuration panel for managing analytics and tracking settings without modifying theme templates.

## Problem Statement

Magento store owners need to integrate multiple analytics and marketing tracking services to measure store performance, understand customer behavior, and optimize marketing campaigns. Manually editing templates for each service is error-prone, requires theme maintenance, and does not scale across multiple services.

## Solution Approach

This module provides a unified configuration-driven integration for Google Analytics 4 and Facebook Pixel tracking. Tracking scripts are injected automatically on all frontend pages via a layout handle, with no template overrides required. A scheduled cron job generates the Google Product Feed for Merchant Center submissions.

## Who is this for?

- Magento store owners who need Google Analytics 4 tracking
- Merchants running Facebook advertising campaigns
- Stores submitting product data to Google Merchant Center
- Developers who want a clean, configurable tracking solution without template modifications

## Use Cases

- Track store traffic and user behavior with Google Analytics 4
- Measure Facebook ad performance with Meta Pixel PageView tracking
- Submit product catalog to Google Shopping via automated feed generation
- Manage all tracking configurations from a single admin panel

## Key Features

- **Google Analytics 4 Integration** — Inject GA4 gtag.js with your Measurement ID on all pages
- **Facebook (Meta) Pixel** — Inject Facebook Pixel with automatic PageView event tracking
- **Google Product Feed** — Scheduled daily XML product feed generation for Google Merchant Center
- **Centralized Configuration** — Manage all tracking settings from a single admin panel
- **Automatic Injection** — Tracking scripts load automatically with no template edits
- **ACL Protected** — Granular admin permissions for configuration access
- **Cron-Based Feed** — Automated daily feed generation at 2:00 AM

## System Requirements

- Magento 2.4.x (Open Source or Adobe Commerce)
- PHP 8.1, 8.2, 8.3, or 8.4
- Composer
- `hk2/core` module (^1.0)

## Installation

See [Installation Guide](docs/installation.md) for detailed instructions.

```bash
composer require hk2/marketing-analytics
bin/magento module:enable HK2_MarketingAnalytics
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

## Configuration

Navigate to **Stores > Configuration > HK2 > Marketing Analytics** in the Magento Admin Panel.

Available settings:

| Setting | Description |
|---------|-------------|
| Enable Module | Toggle the module on/off |
| Google Analytics / GA4 Measurement ID | Your GA4 measurement ID (format: `G-XXXXXXXXXX`) |
| Facebook (Meta) Pixel ID | Your Facebook Pixel ID |
| Enable Google Product Feed | Enable daily product feed generation for Google Shopping |

## Content Security Policy (CSP)

If you have Content Security Policy enabled in your Magento store, ensure the following external domains are whitelisted:

- `https://www.googletagmanager.com` — Google Analytics
- `https://connect.facebook.net` — Facebook Pixel
- `https://www.google-analytics.com` — Google Analytics

## Privacy & GDPR

When using Google Analytics and Facebook Pixel, ensure compliance with applicable privacy regulations:

- Configure your cookie consent mechanism before loading tracking scripts
- Update your privacy policy to disclose third-party tracking services
- Configure Google Analytics IP anonymization if required in your jurisdiction
- Provide opt-out mechanisms where required by law

For detailed usage instructions, refer to the [Usage Guide](docs/usage.md).

## Documentation

- [Installation Guide](docs/installation.md)
- [Usage Guide](docs/usage.md)
- [Compatibility](docs/compatibility.md)

## Known Limitations

- The Google Product Feed generation is scheduled for daily execution and cannot be triggered manually from the admin panel
- Product feed is generated as XML for Google Shopping; other feed formats are not supported
- The module requires the `hk2/core` dependency for the HK2 admin tab and shared components

## Contributing

Contributions are welcome. Please open an issue or pull request on the repository.

Report security vulnerabilities to [support@basantmandal.in](mailto:support@basantmandal.in) — see [SECURITY.md](SECURITY.md) for details.

## License

This module is licensed under the Open Software License 3.0 (OSL-3.0). See [LICENSE.txt](LICENSE.txt).

## Disclaimer

This module is provided "as is" without warranty of any kind. The authors are not responsible for any damages arising from its use. Ensure compliance with applicable laws and regulations when using tracking technologies.
