<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrdersContract;

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
     * @param list<array{
     *   phoneNumber: string, bundleID?: string, requirementGroupID?: string
     * }> $phoneNumbers
     *
     * @throws APIException
     */
    public function create(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderNewResponse {
        $params = [
            'billingGroupID' => $billingGroupID,
            'connectionID' => $connectionID,
            'customerReference' => $customerReference,
            'messagingProfileID' => $messagingProfileID,
            'phoneNumbers' => $phoneNumbers,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderID,
        ?RequestOptions $requestOptions = null
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
     * @param list<array{
     *   fieldValue?: string, requirementID?: string
     * }> $regulatoryRequirements
     *
     * @throws APIException
     */
    public function update(
        string $numberOrderID,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderUpdateResponse {
        $params = [
            'customerReference' => $customerReference,
            'regulatoryRequirements' => $regulatoryRequirements,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($numberOrderID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of number orders.
     *
     * @param array{
     *   createdAt?: array{gt?: string, lt?: string},
     *   customerReference?: string,
     *   phoneNumbersCount?: string,
     *   requirementsMet?: bool,
     *   status?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
