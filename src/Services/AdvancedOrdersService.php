<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\Feature;
use Telnyx\AdvancedOrders\AdvancedOrderCreateParams\PhoneNumberType;
use Telnyx\AdvancedOrders\AdvancedOrderGetResponse;
use Telnyx\AdvancedOrders\AdvancedOrderListResponse;
use Telnyx\AdvancedOrders\AdvancedOrderNewResponse;
use Telnyx\AdvancedOrders\AdvancedOrderUpdateRequirementGroupResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AdvancedOrdersContract;

final class AdvancedOrdersService implements AdvancedOrdersContract
{
    /**
     * @api
     */
    public AdvancedOrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AdvancedOrdersRawService($client);
    }

    /**
     * @api
     *
     * Create Advanced Order
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
    ): AdvancedOrderNewResponse {
        $params = Util::removeNulls(
            [
                'areaCode' => $areaCode,
                'comments' => $comments,
                'countryCode' => $countryCode,
                'customerReference' => $customerReference,
                'features' => $features,
                'phoneNumberType' => $phoneNumberType,
                'quantity' => $quantity,
                'requirementGroupID' => $requirementGroupID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Advanced Order
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        ?RequestOptions $requestOptions = null
    ): AdvancedOrderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($orderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List Advanced Orders
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AdvancedOrderListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update Advanced Order
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
    ): AdvancedOrderUpdateRequirementGroupResponse {
        $params = Util::removeNulls(
            [
                'areaCode' => $areaCode,
                'comments' => $comments,
                'countryCode' => $countryCode,
                'customerReference' => $customerReference,
                'features' => $features,
                'phoneNumberType' => $phoneNumberType,
                'quantity' => $quantity,
                'requirementGroupID' => $requirementGroupID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateRequirementGroup($advancedOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
