<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Model;

class TreeManagement implements \Fabicool\ApiRoadmap\Api\TreeManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getTree($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}

