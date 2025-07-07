<?php
/**
 * @author MageWings
 */

namespace MageWings\OrderImages\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Info extends Field
{
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = <<<HTML
        <div style="background:#f1f1f1;padding:15px;border-left:4px solid #007bdb;">
            <h3>Need Help?</h3>
            <p>Visit our <a href="https://magewings.com" target="_blank">Website</a> or contact <strong>support@magewings.com</strong>.</p>
        </div>
        HTML;
        return $html;
    }
}
