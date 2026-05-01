<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Model;

class SubscribeManagement implements \Fabicool\ApiRoadmap\Api\SubscribeManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function postSubscribe($param)
    {
        return 'hello api POST return the $param ' . $param;
    }
}

