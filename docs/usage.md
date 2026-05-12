# Usage

## Overview

This module integrates Google Analytics 4 and Facebook (Meta) Pixel tracking into your Magento store. It also provides a scheduled Google Product Feed generation for Google Shopping / Merchant Center.

## Configuration

All settings are located in the Magento Admin Panel under:

**Stores > Configuration > HK2 > Marketing Analytics**

### Enabling the Module

1. Navigate to the configuration section
2. Set **Enable Module** to `Yes`
3. Save the configuration

### Google Analytics / GA4

1. Ensure the module is enabled
2. Enter your **Google Analytics / GA4 Measurement ID** (format: `G-XXXXXXXXXX`)
3. Save the configuration
4. The Google Analytics tracking script will automatically be injected on all frontend pages

### Facebook (Meta) Pixel

1. Ensure the module is enabled
2. Enter your **Facebook (Meta) Pixel ID**
3. Save the configuration
4. The Facebook Pixel script, including a `PageView` event, will automatically be injected on all frontend pages

### Google Product Feed

1. Ensure the module is enabled
2. Set **Enable Google Product Feed** to `Yes`
3. Save the configuration
4. The feed is generated daily at 2:00 AM via a Magento cron job

The generated feed is saved to `var/export/google_products.xml` and can be submitted to Google Merchant Center.

## Frontend Behavior

When enabled and configured, the module injects tracking scripts immediately after the opening `<body>` tag on every frontend page. No additional layout changes or template modifications are required.

### Scripts Injected

- **Google Analytics (gtag.js):** Loads the Google tag and configures the measurement ID
- **Facebook Pixel (fbevents.js):** Initializes the pixel and fires a `PageView` event

## Admin Menu

A **Marketing Analytics** menu item is added under the HK2 menu group in the Magento Admin sidebar for quick access to the configuration page.

## Cron Jobs

The module registers one cron job:

| Job | Schedule | Description |
|-----|----------|-------------|
| `hk2_generate_google_feed` | Daily at 2:00 AM | Generates Google Shopping XML product feed |

## Permissions

Admin users need the **HK2 Marketing Analytics Settings** ACL resource to access and modify the module configuration. This is assignable via **System > Permissions > User Roles**.
