<?php
declare(strict_types=1);

namespace Magento\Catalog\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Widget\Block\BlockInterface;

class Slier extends Template implements BlockInterface
{

    protected $_template = 'widget/slider.phtml';

    /**
     * @var CollectionFactory
     */
    private $productCollectionFactory;

    /**
     * @param Context $context
     * @param CollectionFactory $productCollectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $productCollectionFactory,
        array $data = []
    )
    {
        $this->productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

}
