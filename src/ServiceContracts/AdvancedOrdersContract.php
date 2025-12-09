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

interface AdvancedOrdersContract
{
    /**
     * @api
     *
     * @param list<'sms'|'mms'|'voice'|'fax'|'emergency'|Feature> $features
     * @param 'local'|'mobile'|'toll_free'|'shared_cost'|'national'|'landline'|PhoneNumberType $phoneNumberType
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
     *
     * @throws APIException
     */
    public function create(
        string $areaCode = '',
        string $comments = '',
        string $countryCode = 'US',
        string $customerReference = '',
        ?array $features = null,
        string|PhoneNumberType $phoneNumberType = 'local',
        int $quantity = 1,
        ?string $requirementGroupID = null,
        ?RequestOptions $requestOptions = null,
    ): AdvancedOrderNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): AdvancedOrderGetResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AdvancedOrderListResponse;

    /**
     * @api
     *
     * @param list<'sms'|'mms'|'voice'|'fax'|'emergency'|\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\Feature> $features
     * @param 'local'|'mobile'|'toll_free'|'shared_cost'|'national'|'landline'|\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType $phoneNumberType
     * @param string $requirementGroupID The ID of the requirement group to associate with this advanced order
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
        string|\Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupParams\PhoneNumberType $phoneNumberType = 'local',
        int $quantity = 1,
        ?string $requirementGroupID = null,
        ?RequestOptions $requestOptions = null,
    ): AdvancedOrderUpdateRequirementGroupResponse;
}
