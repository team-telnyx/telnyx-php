<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AssociatedPhoneNumbersContract;

final class AssociatedPhoneNumbersService implements AssociatedPhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new associated phone number for a porting order. This is used for partial porting in GB to specify which phone numbers should be kept or disconnected.
     *
     * @param array{
     *   action: "keep"|"disconnect",
     *   phone_number_range: array{end_at?: string, start_at?: string},
     * }|AssociatedPhoneNumberCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|AssociatedPhoneNumberCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberNewResponse {
        [$parsed, $options] = AssociatedPhoneNumberCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/associated_phone_numbers', $portingOrderID],
            body: (object) $parsed,
            options: $options,
            convert: AssociatedPhoneNumberNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of all associated phone numbers for a porting order. Associated phone numbers are used for partial porting in GB to specify which phone numbers should be kept or disconnected.
     *
     * @param array{
     *   filter?: array{action?: "keep"|"disconnect", phone_number?: string},
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: "-created_at"|"created_at"},
     * }|AssociatedPhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|AssociatedPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberListResponse {
        [$parsed, $options] = AssociatedPhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/associated_phone_numbers', $portingOrderID],
            query: $parsed,
            options: $options,
            convert: AssociatedPhoneNumberListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an associated phone number from a porting order.
     *
     * @param array{porting_order_id: string}|AssociatedPhoneNumberDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|AssociatedPhoneNumberDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssociatedPhoneNumberDeleteResponse {
        [$parsed, $options] = AssociatedPhoneNumberDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $portingOrderID = $parsed['porting_order_id'];
        unset($parsed['porting_order_id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'porting_orders/%1$s/associated_phone_numbers/%2$s',
                $portingOrderID,
                $id,
            ],
            options: $options,
            convert: AssociatedPhoneNumberDeleteResponse::class,
        );
    }
}
