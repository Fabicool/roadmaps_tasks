<?php
namespace Fabicool\ApiRoadmap\Api\Data;

interface ProductInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getSku();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return float
     */
    public function getPrice();

    /**
     * @return string
     */
    public function getImageUrl();

    /**
     * @return bool
     */
    public function getStockStatus();

    /**
     * @param int $value
     * @return ProductInterface
     */
    public function setId($value);

    /**
     * @param string $sku
     * @return ProductInterface
     */
    public function setSku($sku);

    /**
     * @param string $name
     * @return ProductInterface
     */
    public function setName($name);

    /**
     * @param float $price
     * @return ProductInterface
     */
    public function setPrice($price);

    /**
     * @param string $imageUrl
     * @return ProductInterface
     */
    public function setImageUrl($imageUrl);

    /**
     * @param bool $stockStatus
     * @return ProductInterface
     */
    public function setStockStatus($stockStatus);
}
