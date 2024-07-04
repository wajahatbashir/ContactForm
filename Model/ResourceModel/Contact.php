<?php

namespace WB\ContactForm\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Contact extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('wb_contactform', 'contact_id');
    }
}
