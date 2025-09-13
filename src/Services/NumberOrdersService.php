<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\NumberOrders\NumberOrderCreateParams;
use Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListParams;
use Telnyx\NumberOrders\NumberOrderListParams\Filter;
use Telnyx\NumberOrders\NumberOrderListParams\Page;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateParams;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrdersContract;

use const Telnyx\Core\OMIT as omit;

final class NumberOrdersService implements NumberOrdersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a phone number order.
     *
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with this phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $messagingProfileID identifies the messaging profile associated with the phone number
     * @param list<PhoneNumber> $phoneNumbers
     *
     * @return NumberOrderNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $billingGroupID = omit,
        $connectionID = omit,
        $customerReference = omit,
        $messagingProfileID = omit,
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderNewResponse {
        $params = [
            'billingGroupID' => $billingGroupID,
            'connectionID' => $connectionID,
            'customerReference' => $customerReference,
            'messagingProfileID' => $messagingProfileID,
            'phoneNumbers' => $phoneNumbers,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NumberOrderNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NumberOrderNewResponse {
        [$parsed, $options] = NumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'number_orders',
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an existing phone number order.
     *
     * @return NumberOrderGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderGetResponse {
        $params = [];

        return $this->retrieveRaw($numberOrderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return NumberOrderGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $numberOrderID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): NumberOrderGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['number_orders/%1$s', $numberOrderID],
            options: $requestOptions,
            convert: NumberOrderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a phone number order.
     *
     * @param string $customerReference a customer reference string for customer look ups
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     *
     * @return NumberOrderUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $numberOrderID,
        $customerReference = omit,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderUpdateResponse {
        $params = [
            'customerReference' => $customerReference,
            'regulatoryRequirements' => $regulatoryRequirements,
        ];

        return $this->updateRaw($numberOrderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NumberOrderUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $numberOrderID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): NumberOrderUpdateResponse {
        [$parsed, $options] = NumberOrderUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['number_orders/%1$s', $numberOrderID],
            body: (object) $parsed,
            options: $options,
            convert: NumberOrderUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a paginated list of number orders.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return NumberOrderListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NumberOrderListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NumberOrderListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NumberOrderListResponse {
        [$parsed, $options] = NumberOrderListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'number_orders',
            query: $parsed,
            options: $options,
            convert: NumberOrderListResponse::class,
        );
    }
}
