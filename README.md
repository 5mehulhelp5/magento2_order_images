# magento2_order_images

Magento 2 module to display product images on order view pages in both the **Customer Account** and **Admin Panel**.

## 🖼️ Features

- Adds product images to the **My Orders > Order View** page on the storefront.
- Displays product images in the **Admin Sales Order View** under "Items Ordered."
- Improves order clarity and customer experience.
- Admin configuration option to enable or disable the feature.

## 🔧 Configuration

Go to:
`Stores > Configuration > MAGEWINGS > Order Images`

Set **Enable Module** to `Yes` or `No` to control visibility.

## 🛠️ Installation

Use Composer or manual installation:

### Option 1: Composer
```bash
composer require magewings/order-images
bin/magento module:enable MageWings_OrderImages
bin/magento setup:upgrade
bin/magento cache:flush