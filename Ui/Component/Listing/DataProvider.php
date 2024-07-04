<?php

namespace WB\ContactForm\Ui\Component\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider as UiDataProvider;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

class DataProvider extends UiDataProvider
{
    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        SearchResultInterface $collection,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collection;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $this->data[$item->getId()] = $item->getData();
        }
        return $this->data;
    }
}
