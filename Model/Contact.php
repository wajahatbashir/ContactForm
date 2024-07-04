<?php

namespace WB\ContactForm\Model;

use Magento\Framework\Model\AbstractModel;

class Contact extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('WB\ContactForm\Model\ResourceModel\Contact');
    }
}
