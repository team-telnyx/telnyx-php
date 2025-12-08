<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionDeleteResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListParams;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionListResponse;
use Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\PhoneNumberExtensionsContract;

final class PhoneNumberExtensionsService implements PhoneNumberExtensionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new phone number extension.
     *
     * @param array{
     *   activation_ranges: list<array{end_at: int, start_at: int}>,
     *   extension_range: array{end_at: int, start_at: int},
     *   porting_phone_number_id: string,
     * }|PhoneNumberExtensionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|PhoneNumberExtensionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionNewResponse {
        [$parsed, $options] = PhoneNumberExtensionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PhoneNumberExtensionNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/phone_number_extensions', $portingOrderID],
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberExtensionNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of all phone number extensions of a porting order.
     *
     * @param array{
     *   filter?: array{porting_phone_number_id?: string},
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: '-created_at'|'created_at'},
     * }|PhoneNumberExtensionListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|PhoneNumberExtensionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionListResponse {
        [$parsed, $options] = PhoneNumberExtensionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PhoneNumberExtensionListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/phone_number_extensions', $portingOrderID],
            query: $parsed,
            options: $options,
            convert: PhoneNumberExtensionListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a phone number extension.
     *
     * @param array{porting_order_id: string}|PhoneNumberExtensionDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|PhoneNumberExtensionDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberExtensionDeleteResponse {
        [$parsed, $options] = PhoneNumberExtensionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $portingOrderID = $parsed['porting_order_id'];
        unset($parsed['porting_order_id']);

        /** @var BaseResponse<PhoneNumberExtensionDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'porting_orders/%1$s/phone_number_extensions/%2$s', $portingOrderID, $id,
            ],
            options: $options,
            convert: PhoneNumberExtensionDeleteResponse::class,
        );

        return $response->parse();
    }
}
