<?php

namespace Fabicool\ApiRoadmap\Api\Data;

interface CategoryNodeInterface
{
    /** @return int */
    public function getId();

    /**
     * @param int $id
     * @return \Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterface
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /** @param string $name
     * @return \Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterface
     */
    public function setName($name);

    /**
     * @return int
     */
    public function getProductCount();

    /**
     * @param int $count
     * @return \Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterface
     */
    public function setProductCount($count);

    /**
     * @return \Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterface[]
     */
    public function getChildren();

    /**
     * @param \Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterface[] $children
     * @return \Fabicool\ApiRoadmap\Api\Data\CategoryNodeInterface
     */
    public function setChildren(array $children);
}
