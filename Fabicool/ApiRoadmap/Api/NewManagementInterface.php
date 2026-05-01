<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Api;

interface NewManagementInterface
{

    /**
     * GET for new api
     * @param string $param
     * @return string
     */
    public function getNew($param);
}

