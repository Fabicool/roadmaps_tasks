<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Api;

interface BestsellersManagementInterface
{

    /**
     * GET for bestsellers api
     * @param string $param
     * @return string
     */
    public function getBestsellers($param);
}

