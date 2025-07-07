<?php
/**
 * @author MageWings
 */

namespace MageWings\OrderImages\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class OrderItem implements ArgumentInterface
{

    /**
     * @var string
     */
    protected $imageUrl = "";
    
    /**
     * @var \Magento\Catalog\Helper\Image
     */
    protected $imageHelper;

    /**
     * OrderItem constructor.
     * @param \Magento\Catalog\Helper\Image $imageHelper
     */
    public function __construct(\Magento\Catalog\Helper\Image $imageHelper)
    {
        $this->imageHelper = $imageHelper;
    }

    /**
     * Get the image URL for the order item
     *
     * @param \Magento\Sales\Model\Order\Item|null $item
     * @return string
     */
    public function getImageUrl($item = null)
    {
        if ($item && $item->getProductId()) {
            $product = $item->getProduct();
            $this->imageUrl = $this->imageHelper->init($product, 'thumbnail',['type'=>'thumbnail'])
                ->keepAspectRatio(true)->resize('80', '80')->getUrl();
        }
        return $this->imageUrl;
    }
}
