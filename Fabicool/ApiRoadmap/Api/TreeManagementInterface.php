<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Api;

interface TreeManagementInterface
{

    /**
     * GET for tree api
     * @param string $param
     * @return string
     */
    public function getTree($param);
}

