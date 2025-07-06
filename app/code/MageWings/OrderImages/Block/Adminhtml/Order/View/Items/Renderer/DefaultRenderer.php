<?php
/**
 * @author MageWings
 */

namespace MageWings\OrderImages\Block\Adminhtml\Order\View\Items\Renderer;

use Magento\Sales\Model\Order\Item;

class DefaultRenderer extends \Magento\Sales\Block\Adminhtml\Order\View\Items\Renderer\DefaultRenderer
{
    /**
     * @var \Magento\Catalog\Helper\Image
     */
    protected $imageHelper;

    /**
     * DefaultRenderer constructor.
     *
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
     * @param \Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\GiftMessage\Helper\Message $messageHelper
     * @param \Magento\Checkout\Helper\Data $checkoutHelper
     * @param \Magento\Catalog\Helper\Image $imageHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry,
        \Magento\CatalogInventory\Api\StockConfigurationInterface $stockConfiguration,
        \Magento\Framework\Registry $registry,
        \Magento\GiftMessage\Helper\Message $messageHelper,
        \Magento\Checkout\Helper\Data $checkoutHelper,
        \Magento\Catalog\Helper\Image $imageHelper,
        array $data = []
    ){
        parent::__construct(
            $context,
            $stockRegistry,
            $stockConfiguration,
            $registry,
            $messageHelper,
            $checkoutHelper,
            $data
        );
        $this->imageHelper = $imageHelper;
    }

    /**
     * Retrieve rendered column html content
     *
     * @param \Magento\Framework\DataObject|Item $item
     * @param string $column
     * @param string $field
     * @return string
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @since 100.1.0
     */
    public function getColumnHtml(\Magento\Framework\DataObject $item, $column, $field = null)
    {
        $html = '';
        switch ($column) {
            case 'product':
                if ($this->canDisplayContainer()) {
                    $html .= '<div id="' . $this->getHtmlId() . '">';
                }
                $html .= $this->getColumnHtml($item, 'name');
                if ($this->canDisplayContainer()) {
                    $html .= '</div>';
                }
                break;
            case 'status':
                $html = $item->getStatus();
                break;
            case 'price-original':
                $html = $this->displayPriceAttribute('original_price');
                break;
            case 'tax-amount':
                $html = $this->displayPriceAttribute('tax_amount');
                break;
            case 'tax-percent':
                $html = $this->displayTaxPercent($item);
                break;
            case 'discont':
                $html = $this->displayPriceAttribute('discount_amount');
                break;
            case 'product-image':
                $product = $item->getProduct();
                if ($product) {
                    $imageUrl = $this->imageHelper->init($product, 'thumbnail',['type'=>'thumbnail'])
                        ->keepAspectRatio(true)->resize('100', '100')->getUrl();
                    $html = '<img src="' . $imageUrl . '" alt="' . __('Product Image') . '" style="max-width: 100px; max-height: 100px;"/>';
                } else {
                    $html = __('No Image');
                }
                break;
            default:
                $html = parent::getColumnHtml($item, $column, $field);
        }
        return $html;
    }
}
