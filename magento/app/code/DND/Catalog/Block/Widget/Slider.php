<?php
declare(strict_types=1);

namespace DND\Catalog\Block\Widget;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Product;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Pricing\Helper\Data as PriceHelper;
use Magento\Widget\Block\BlockInterface;
use Magento\Catalog\Helper\Image;

class Slider extends Template implements BlockInterface
{

    protected $_template = 'widget/slider.phtml';

    /**
     * @var CollectionFactory
     */
    private $productCollectionFactory;

    /**
     * @var
     */
    private $productRepository;
    /**
     * @var Image
     */
    private $imageHelper;

    /**
     * @var PriceHelper
     */
    private $priceHelper;

    /**
     * @param Context $context
     * @param CollectionFactory $productCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context                    $context,
        CollectionFactory          $productCollectionFactory,
        ProductRepositoryInterface $productRepository,
        Image                      $imageHelper,
        PriceHelper $priceHelper,
        array                      $data = []
    )
    {
        $this->productCollectionFactory = $productCollectionFactory;
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
        $this->imageHelper = $imageHelper;
        $this->priceHelper = $priceHelper;
    }

    public function getProductCollectionByCategoryId($id)
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => [$id]]);
        return $collection->getData();
    }

    public function getProductsFromCategory($id): array
    {
        $productCollection = $this->getProductCollectionByCategoryId($id);
        $products = [];
        foreach ($productCollection as $productData) {
            $product = $this->productRepository->get($productData['sku']);
            $products[] = $product;
        }
        return $products;
    }


    /**
     * Récupère l'URL de l'image du produit
     *
     * @param Product $product
     * @return string
     */
    public function getProductImageUrl(Product $product): string
    {
        return $this->imageHelper->init($product, 'product_base_image')->getUrl();
    }

    /**
     * Formater le prix avec deux décimales et le symbole monétaire
     *
     * @param float $price
     * @return string
     */
    public function formatPrice($price)
    {
        // Utiliser le helper pour formater le prix avec deux décimales et le symbole monétaire
        return $this->priceHelper->currency($price, true, false);
    }

}
