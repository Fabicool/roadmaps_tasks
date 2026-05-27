<?php
namespace Fabicool\ApiRoadmap\Api;

interface CategoryManagementInterface
{
    /**
     * Отримати дерево категорій
     *
     * @return \Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterface[]
     */
    public function getTree();
}
