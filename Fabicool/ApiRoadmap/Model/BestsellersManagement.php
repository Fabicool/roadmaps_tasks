<?php
declare(strict_types=1);

namespace Fabicool\ApiRoadmap\Model;

class BestsellersManagement implements \Fabicool\ApiRoadmap\Api\BestsellersManagementInterface
{

    /**
     * {@inheritdoc}
     */
    public function getBestsellers($param)
    {
        return 'hello api GET return the $param ' . $param;
    }
}

