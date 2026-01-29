<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderGetResponse;
use Telnyx\AdvancedOrders\AdvancedOrderListResponse;
use Telnyx\AdvancedOrders\AdvancedOrderNewResponse;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AdvancedOrdersContract
{
    /**
     * @api
     *
     * @param list<Feature|value-of<Feature>> $features
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $areaCode = '',
        string $comments = '',
        string $countryCode = 'US',
        string $customerReference = '',
        ?array $features = null,
        PhoneNumberType|string $phoneNumberType = 'local',
        int $quantity = 1,
        ?string $requirementGroupID = null,
        RequestOptions|array|null $requestOptions = null,
    ): AdvancedOrderNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
    ): AdvancedOrderGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): AdvancedOrderListResponse;

    /**
     * @api
     *
     * @param list<\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\Feature|value-of<\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\Feature>> $features
     * @param \Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType|value-of<\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType> $phoneNumberType
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateRequirementGroup(
        string $advancedOrderID,
        string $areaCode = '',
        string $comments = '',
        string $countryCode = 'US',
        string $customerReference = '',
        ?array $features = null,
        \Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType|string $phoneNumberType = 'local',
        int $quantity = 1,
        ?string $requirementGroupID = null,
        RequestOptions|array|null $requestOptions = null,
    ): AdvancedOrderUpdateRequirementGroupResponse;
}
