<?php
/**
 *
 *          ..::..
 *     ..::::::::::::..
 *   ::'''''':''::'''''::
 *   ::..  ..:  :  ....::
 *   ::::  :::  :  :   ::
 *   ::::  :::  :  ''' ::
 *   ::::..:::..::.....::
 *     ''::::::::::::''
 *          ''::''
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@tig.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@tig.nl for more information.
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\PostNL\Block\Adminhtml\Config\Carrier\Tablerate;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data;
use Magento\OfflineShipping\Block\Adminhtml\Carrier\Tablerate\Grid as MagentoGrid;
use Magento\OfflineShipping\Model\ResourceModel\Carrier\Tablerate\CollectionFactory as MagentoCollectionFactory;

use TIG\PostNL\Model\Carrier\Tablerate;
use TIG\PostNL\Model\ResourceModel\Tablerate\CollectionFactory;

class Grid extends MagentoGrid
{
    /**
     * By overriding the parameters of the consturctor,
     * the PostNL Tablerate model and collection will be used instead those of OfflineShipping.
     *
     * @param Context                  $context
     * @param Data                     $backendHelper
     * @param MagentoCollectionFactory $collectionFactory
     * @param Tablerate                $tablerate
     * @param CollectionFactory        $postNLCollectionFactory
     * @param array                    $data
     */
    public function __construct(
        Context $context,
        Data $backendHelper,
        MagentoCollectionFactory $collectionFactory,
        Tablerate $tablerate,
        CollectionFactory $postNLCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $backendHelper, $collectionFactory, $tablerate, $data);

        $this->_collectionFactory = $postNLCollectionFactory;
    }
}
