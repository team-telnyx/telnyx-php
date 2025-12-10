<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NumberOrders\NumberOrderCreateParams;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListParams;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateParams;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\NumberOrdersRawContract;

final class NumberOrdersRawService implements NumberOrdersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a phone number order.
     *
     * @param array{
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   messagingProfileID?: string,
     *   phoneNumbers?: list<array{
     *     phoneNumber: string, bundleID?: string, requirementGroupID?: string
     *   }>,
     * }|NumberOrderCreateParams $params
     *
     * @return BaseResponse<NumberOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberOrderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $numberOrderID the number order ID
     *
     * @return BaseResponse<NumberOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $numberOrderID the number order ID
     * @param array{
     *   customerReference?: string,
     *   regulatoryRequirements?: list<array{
     *     fieldValue?: string, requirementID?: string
     *   }>,
     * }|NumberOrderUpdateParams $params
     *
     * @return BaseResponse<NumberOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $numberOrderID,
        array|NumberOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberOrderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   filter?: array{
     *     createdAt?: array{gt?: string, lt?: string},
     *     customerReference?: string,
     *     phoneNumbersCount?: string,
     *     requirementsMet?: bool,
     *     status?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|NumberOrderListParams $params
     *
     * @return BaseResponse<DefaultPagination<NumberOrderListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NumberOrderListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = NumberOrderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'number_orders',
            query: $parsed,
            options: $options,
            convert: NumberOrderListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
