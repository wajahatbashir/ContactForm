<?php
namespace WB\ContactForm\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use WB\ContactForm\Model\ContactFactory;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\ScopeInterface;

class Post extends Action
{
    protected $contactFactory;
    protected $scopeConfig;
    protected $transportBuilder;

    public function __construct(
        Context $context,
        ContactFactory $contactFactory,
        ScopeConfigInterface $scopeConfig,
        TransportBuilder $transportBuilder
    ) {
        $this->contactFactory = $contactFactory;
        $this->scopeConfig = $scopeConfig;
        $this->transportBuilder = $transportBuilder;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('*/*/');
            <?php

        }

        try {
            $contact = $this->contactFactory->create();
            $contact->setData($data);
            $contact->save();

            // Get admin email from configuration
            $adminEmail = $this->scopeConfig->getValue(
                'wb_contactform/general/email',
                ScopeInterface::SCOPE_STORE
            );

            // Send email
            $this->sendEmail($data, $adminEmail);

            $this->messageManager->addSuccessMessage(__('Your inquiry was submitted and will be responded to as soon as possible.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('We can\'t process your request right now. Please try again later.'));
        }

        $this->_redirect('*/*/');
    }

    protected function sendEmail($data, $adminEmail)
    {
        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($data);

        $sender = [
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
        ];

        $transport = $this->transportBuilder
            ->setTemplateIdentifier('contact_form_email_template')
            ->setTemplateOptions(
                [
                    'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                    'store' => $this->storeManager->getStore()->getId(),
                ]
            )
            ->setTemplateVars(['data' => $postObject])
            ->setFrom($sender)
            ->addTo($adminEmail)
            ->getTransport();

        $transport->sendMessage();
    }
}
