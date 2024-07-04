<?php

namespace WB\ContactForm\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_WB_CONTACTFORM = 'wb_contactform/';

    public function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_WB_CONTACTFORM . 'general/' . $field,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function isEnabled($storeId = null)
    {
        return $this->getConfigValue('enabled', $storeId);
    }

    public function getEmailRecipient($storeId = null)
    {
        return $this->getConfigValue('email', $storeId);
    }
}
