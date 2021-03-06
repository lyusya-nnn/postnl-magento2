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
namespace TIG\PostNL\Service\Shipment;

use TIG\PostNL\Api\Data\ShipmentInterface;
use Magento\Sales\Model\Order\Shipment as MagentoShipment;

class Type
{
    /**
     * @param ShipmentInterface $postNLShipment
     *
     * @return null|string
     */
    public function get(ShipmentInterface $postNLShipment)
    {
        $shipmentType = $postNLShipment->getShipmentType();
        if ($shipmentType !== null) {
            return $shipmentType;
        }

        $magentoShipment = $postNLShipment->getShipment();
        $address = $magentoShipment->getShippingAddress();
        $countryId = $address->getCountryId();

        return $this->getTypeForCountry($countryId);
    }

    /**
     * @param string $countryId
     *
     * @return string
     */
    private function getTypeForCountry($countryId)
    {
        if ($countryId == 'NL') {
            return 'Daytime';
        }

        if (in_array($countryId, EpsCountries::ALL)) {
            return 'EPS';
        }

        return 'GLOBALPACK';
    }
}
