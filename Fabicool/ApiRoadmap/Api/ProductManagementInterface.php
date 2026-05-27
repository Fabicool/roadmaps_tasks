<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Api;

interface ProductManagementInterface
{

    /**
     * Getting all bestselling products with pagination
     *
     * @param int $pageSize
     * @param int $currentPage
     * @return \Fabicool\ApiRoadmap\Api\Data\ProductInterface[]
     */
    public function getBestsellers($pageSize = 10, $currentPage = 1);

    /**
     * Getting all products created in the last 30 days by rest with pagination
     *
     * @param int $pageSize
     * @param int $currentPage
     * @return \Fabicool\ApiRoadmap\Api\Data\ProductInterface[]
     */
    public function getNewProducts($pageSize = 10, $currentPage = 1);
}

