<?php
namespace Fabicool\ApiRoadmap\Model\Data;

use Fabicool\ApiRoadmap\Api\Data\ProductInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

/**
 * Клас даних для продукту
 */
class Product extends AbstractExtensibleModel implements ProductInterface
{
    /**
     * @inheirtDoc
     */
    public function getId()
    {
        return $this->getData('id');
    }

    /**
     * @inheirtDoc
     */
    public function setId($value)
    {
        return $this->setData('id', $value);
    }

    /**
     * @inheirtDoc
     */
    public function getSku()
    {
        return $this->getData('sku');
    }

    /**
     * @inheirtDoc
     */
    public function setSku($sku)
    {
        return $this->setData('sku', $sku);
    }

    /**
     * @inheirtDoc
     */
    public function getName()
    {
        return $this->getData('name');
    }

    /**
     * @inheirtDoc
     */
    public function setName($name)
    {
        return $this->setData('name', $name);
    }

    /**
     * @inheirtDoc
     */
    public function getPrice()
    {
        return $this->getData('price');
    }

    /**
     * @inheirtDoc
     */
    public function setPrice($price)
    {
        return $this->setData('price', $price);
    }

    /**
     * @inheirtDoc
     */
    public function getImageUrl()
    {
        return $this->getData('image_url');
    }

    /**
     * @inheirtDoc
     */
    public function setImageUrl($image_url)
    {
        return $this->setData('image_url', $image_url);
    }

    /**
     * @inheirtDoc
     */
    public function getStockStatus()
    {
        return $this->getData('stock_status');
    }

    /**
     * @inheirtDoc
     */
    public function setStockStatus($stock_status)
    {
        return $this->setData('stock_status', $stock_status);
    }
}
