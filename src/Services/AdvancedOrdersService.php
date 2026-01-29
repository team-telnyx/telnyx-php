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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $orderID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
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
