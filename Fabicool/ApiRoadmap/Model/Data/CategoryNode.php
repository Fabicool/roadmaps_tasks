<?php
namespace Fabicool\ApiRoadmap\Model\Data;

use Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class CategoryNode extends AbstractExtensibleModel implements CategoryNodeInterface
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
    public function setId($id)
    {
        return $this->setData('id', $id);
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
    public function getProductCount()
    {
        return $this->getData('product_count');
    }

    /**
     * @inheirtDoc
     */
    public function setProductCount($count)
    {
        return $this->setData('product_count', $count);
    }

    /**
     * @inheirtDoc
     */
    public function getChildren()
    {
        return $this->getData('children') ?: [];
    }

    /**
     * @inheirtDoc
     */
    public function setChildren(array $children)
    {
        return $this->setData('children', $children);
    }
}
