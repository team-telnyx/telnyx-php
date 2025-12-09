<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberDeleteResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListParams\Sort\Value;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberListResponse;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AssociatedPhoneNumbersRawContract;

final class AssociatedPhoneNumbersRawService implements AssociatedPhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new associated phone number for a porting order. This is used for partial porting in GB to specify which phone numbers should be kept or disconnected.
     *
     * @param string $portingOrderID Identifies the Porting Order associated with the phone number
     * @param array{
     *   action: 'keep'|'disconnect'|Action,
     *   phoneNumberRange: array{endAt?: string, startAt?: string},
     * }|AssociatedPhoneNumberCreateParams $params
     *
     * @return BaseResponse<AssociatedPhoneNumberNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $portingOrderID,
        array|AssociatedPhoneNumberCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociatedPhoneNumberCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $portingOrderID Identifies the Porting Order associated with the phone numbers
     * @param array{
     *   filter?: array{
     *     action?: 'keep'|'disconnect'|AssociatedPhoneNumberListParams\Filter\Action,
     *     phoneNumber?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: '-created_at'|'created_at'|Value},
     * }|AssociatedPhoneNumberListParams $params
     *
     * @return BaseResponse<AssociatedPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $portingOrderID,
        array|AssociatedPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociatedPhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Identifies the associated phone number to be deleted
     * @param array{portingOrderID: string}|AssociatedPhoneNumberDeleteParams $params
     *
     * @return BaseResponse<AssociatedPhoneNumberDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|AssociatedPhoneNumberDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssociatedPhoneNumberDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $portingOrderID = $parsed['portingOrderID'];
        unset($parsed['portingOrderID']);

        // @phpstan-ignore-next-line return.type
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
