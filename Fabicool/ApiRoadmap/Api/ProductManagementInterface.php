<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Api;

interface ProductManagementInterface
{

    /**
     * @param int $pageSize
     * @param int $currentPage
     * @return \Fabicool\ApiRoadmap\Api\Data\ProductInterface[]
     */
    public function getBestsellers($pageSize = 10, $currentPage = 1);

    /**
     * @param int $pageSize
     * @param int $currentPage
     * @return \Fabicool\ApiRoadmap\Api\Data\ProductInterface[]
     */
    public function getNewProducts($pageSize = 10, $currentPage = 1);
}

