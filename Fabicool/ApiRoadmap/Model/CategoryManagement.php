<?php

namespace Fabicool\ApiRoadmap\Model;

use Fabicool\ApiRoadmap\Api\CategoryManagementInterface;
use Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterfaceFactory;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;

class CategoryManagement implements CategoryManagementInterface
{
    /**
     * @param CollectionFactory $collectionFactory
     * @param CategoryNodeInterfaceFactory $nodeFactory
     */
    public function __construct(
       protected CollectionFactory $collectionFactory,
       protected CategoryNodeInterfaceFactory $nodeFactory
    ) {
    }

    /**
     * Getting categories tree by rest
     *
     * @return array
     */
    public function getTree()
    {
        try {
            $collection = $this->collectionFactory->create()
                ->addAttributeToSelect(['name', 'is_active'])
                ->addAttributeToFilter('is_active', 1);

            return $this->buildTree($collection, 1); // Починаємо з кореневої категорії (ID 1 або 2)
        } catch (\Exception $e) {
            throw new \Magento\Framework\Exception\LocalizedException(__("Something went wrong with the getting tree."));
        }
    }

    /**
     * @param $collection
     * @param $parentId
     * @return array
     */
    private function buildTree($collection, $parentId)
    {
        $nodes = [];
        foreach ($collection as $category) {
            if ($category->getParentId() == $parentId) {
                $node = $this->nodeFactory->create();
                $node->setId((int)$category->getId())
                    ->setName($category->getName())
                    ->setProductCount($category->getProductCount())
                    ->setChildren($this->buildTree($collection, $category->getId()));
                $nodes[] = $node;
            }
        }
        return $nodes;
    }
}
