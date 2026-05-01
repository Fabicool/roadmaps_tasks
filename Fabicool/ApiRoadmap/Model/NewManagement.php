<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Model;

class NewManagement implements \Fabicool\ApiRoadmap\Api\NewManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getNew($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}

