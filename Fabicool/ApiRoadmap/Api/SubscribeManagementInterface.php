<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Api;

interface SubscribeManagementInterface
{

    /**
     * POST for subscribe api
     * @param string $param
     * @return string
     */
    public function postSubscribe($param);
}

