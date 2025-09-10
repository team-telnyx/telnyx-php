<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateParams\Feature as Feature1;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateParams\PhoneNumberType as PhoneNumberType1;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AdvancedOrdersContract
{
    /**
     * @api
     *
     * @param string $areaCode
     * @param string $comments
     * @param string $countryCode
     * @param string $customerReference
     * @param list<Feature|value-of<Feature>> $features
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param int $quantity
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     */
    public function create(
        $areaCode = omit,
        $comments = omit,
        $countryCode = omit,
        $customerReference = omit,
        $features = omit,
        $phoneNumberType = omit,
        $quantity = omit,
        $requirementGroupID = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $areaCode
     * @param string $comments
     * @param string $countryCode
     * @param string $customerReference
     * @param list<Feature1|value-of<Feature1>> $features
     * @param PhoneNumberType1|value-of<PhoneNumberType1> $phoneNumberType
     * @param int $quantity
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     */
    public function update(
        string $orderID,
        $areaCode = omit,
        $comments = omit,
        $countryCode = omit,
        $customerReference = omit,
        $features = omit,
        $phoneNumberType = omit,
        $quantity = omit,
        $requirementGroupID = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): mixed;
}
