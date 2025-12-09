<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter\PortingOrderStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingPhoneNumbersContract;

final class PortingPhoneNumbersService implements PortingPhoneNumbersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a list of your porting phone numbers.
     *
     * @param array{
     *   filter?: array{
     *     porting_order_status?: 'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'|PortingOrderStatus,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|PortingPhoneNumberListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PortingPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingPhoneNumberListResponse {
        [$parsed, $options] = PortingPhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PortingPhoneNumberListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'porting_phone_numbers',
            query: $parsed,
            options: $options,
            convert: PortingPhoneNumberListResponse::class,
        );

        return $response->parse();
    }
}
