<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListParams\Filter;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrdersContract;

/**
 * Number orders.
 *
 * @phpstan-import-type PhoneNumberShape from \Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber
 * @phpstan-import-type UpdateRegulatoryRequirementShape from \Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement
 * @phpstan-import-type FilterShape from \Telnyx\NumberOrders\NumberOrderListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumberOrdersService implements NumberOrdersContract
{
    /**
     * @api
     */
    public NumberOrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumberOrdersRawService($client);
    }

    /**
     * @api
     *
     * Creates a phone number order.
     *
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with this phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $messagingProfileID identifies the messaging profile associated with the phone number
     * @param list<PhoneNumber|PhoneNumberShape> $phoneNumbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderNewResponse {
        $params = Util::removeNulls(
            [
                'billingGroupID' => $billingGroupID,
                'connectionID' => $connectionID,
                'customerReference' => $customerReference,
                'messagingProfileID' => $messagingProfileID,
                'phoneNumbers' => $phoneNumbers,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an existing phone number order.
     *
     * @param string $numberOrderID the number order ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderID,
        RequestOptions|array|null $requestOptions = null
    ): NumberOrderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($numberOrderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a phone number order.
     *
     * @param string $numberOrderID the number order ID
     * @param string $customerReference a customer reference string for customer look ups
     * @param list<UpdateRegulatoryRequirement|UpdateRegulatoryRequirementShape> $regulatoryRequirements
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $numberOrderID,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderUpdateResponse {
        $params = Util::removeNulls(
            [
                'customerReference' => $customerReference,
                'regulatoryRequirements' => $regulatoryRequirements,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($numberOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of number orders.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NumberOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
