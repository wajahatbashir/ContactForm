<?php
namespace WB\ContactForm\Block;

use Magento\Framework\View\Element\Template;

class Contact extends Template
{
    public function getFormAction()
    {
        return $this->getUrl('contactform/index/post', ['_secure' => true]);
    }
}
