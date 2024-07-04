<?php

namespace WB\ContactForm\Model\ResourceModel\Contact;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use WB\ContactForm\Model\Contact;
use WB\ContactForm\Model\ResourceModel\Contact as ContactResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Contact::class, ContactResource::class);
    }
}
