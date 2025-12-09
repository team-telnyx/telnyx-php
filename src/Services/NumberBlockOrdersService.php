<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\NumberBlockOrders\NumberBlockOrderGetResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderListResponse;
use Telnyx\NumberBlockOrders\NumberBlockOrderNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberBlockOrdersContract;

final class NumberBlockOrdersService implements NumberBlockOrdersContract
{
    /**
     * @api
     */
    public NumberBlockOrdersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumberBlockOrdersRawService($client);
    }

    /**
     * @api
     *
     * Creates a phone number block order.
     *
     * @param int $range the phone number range included in the block
     * @param string $startingNumber Starting phone number block
     * @param string $connectionID identifies the connection associated with this phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $messagingProfileID identifies the messaging profile associated with the phone number
     *
     * @throws APIException
     */
    public function create(
        int $range,
        string $startingNumber,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?RequestOptions $requestOptions = null,
    ): NumberBlockOrderNewResponse {
        $params = [
            'range' => $range,
            'startingNumber' => $startingNumber,
            'connectionID' => $connectionID,
            'customerReference' => $customerReference,
            'messagingProfileID' => $messagingProfileID,
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
     * Get an existing phone number block order.
     *
     * @param string $numberBlockOrderID the number block order ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberBlockOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberBlockOrderGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($numberBlockOrderID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of number block orders.
     *
     * @param array{
     *   createdAt?: array{gt?: string, lt?: string},
     *   phoneNumbersStartingNumber?: string,
     *   status?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers.starting_number]
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
    ): NumberBlockOrderListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
