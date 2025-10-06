<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\PhoneNumberType;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
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
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $areaCode
     * @param string $comments
     * @param string $countryCode
     * @param string $customerReference
     * @param list<\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\Feature|value-of<\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\Feature>> $features
     * @param \Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType|value-of<\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType> $phoneNumberType
     * @param int $quantity
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $advancedOrderID,
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
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRequirementGroupRaw(
        string $advancedOrderID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
