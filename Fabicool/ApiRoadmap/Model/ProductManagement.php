<?php
namespace Fabicool\ApiRoadmap\Model;

use Fabicool\ApiRoadmap\Api\ProductManagementInterface;
use Fabicool\ApiRoadmap\Api\Data\ProductInterfaceFactory;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Sales\Model\ResourceModel\Report\Bestsellers\CollectionFactory as BestsellersFactory;
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Catalog\Helper\Image as ImageHelper;

class ProductManagement implements ProductManagementInterface
{
    protected $collectionFactory;
    protected $bestsellersFactory;
    protected $productDtoFactory;
    protected $stockRegistry;
    protected $imageHelper;

    public function __construct(
        CollectionFactory $collectionFactory,
        BestsellersFactory $bestsellersFactory,
        ProductInterfaceFactory $productDtoFactory,
        StockRegistryInterface $stockRegistry,
        ImageHelper $imageHelper
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->bestsellersFactory = $bestsellersFactory;
        $this->productDtoFactory = $productDtoFactory;
        $this->stockRegistry = $stockRegistry;
        $this->imageHelper = $imageHelper;
    }

    /**
     * @inheirtDoc
     */
    public function getBestsellers($pageSize = 10, $currentPage = 1)
    {
        $reportCollection = $this->bestsellersFactory->create()->setPageSize($pageSize)->setCurPage($currentPage);
        $ids = [];
        foreach ($reportCollection as $item) { $ids[] = $item->getProductId(); }

        $collection = $this->collectionFactory->create()
            ->addIdFilter($ids)
            ->addAttributeToSelect(['name', 'price', 'small_image']);

        return $this->processCollection($collection);
    }

    /**
     * @inheirtDoc
     */
    public function getNewProducts($pageSize = 10, $currentPage = 1)
    {
        $thirtyDaysAgo = date('Y-m-d', strtotime('-30 days'));
        $collection = $this->collectionFactory->create()
            ->addAttributeToSelect(['name', 'price', 'small_image'])
            ->addAttributeToFilter('created_at', ['gteq' => $thirtyDaysAgo])
            ->setPageSize($pageSize)
            ->setCurPage($currentPage);

        return $this->processCollection($collection);
    }

    /**
     * Creating collection items to interface item
     *
     * @param $collection
     * @return array
     */
    private function processCollection($collection): array
    {
        $result = [];
        foreach ($collection as $product) {
            $stock = $this->stockRegistry->getStockItem($product->getId());
            $dto = $this->productDtoFactory->create();
            $dto->setId((int)$product->getId())
                ->setSku((string)$product->getSku())
                ->setName((string)$product->getName())
                ->setPrice((float)$product->getFinalPrice())
                ->setImageUrl($this->imageHelper->init($product, 'product_small_image')->getUrl())
                ->setStockStatus((bool)$stock->getIsInStock());
            $result[] = $dto;
        }
        return $result;
    }
}
