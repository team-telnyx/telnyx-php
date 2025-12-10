<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListParams\Filter\PortingOrderStatus;
use Telnyx\PortingPhoneNumbers\PortingPhoneNumberListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingPhoneNumbersRawContract;

final class PortingPhoneNumbersRawService implements PortingPhoneNumbersRawContract
{
    // @phpstan-ignore-next-line
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
     *     portingOrderStatus?: 'draft'|'in-process'|'submitted'|'exception'|'foc-date-confirmed'|'cancel-pending'|'ported'|'cancelled'|PortingOrderStatus,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|PortingPhoneNumberListParams $params
     *
     * @return BaseResponse<DefaultPagination<PortingPhoneNumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PortingPhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PortingPhoneNumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting_phone_numbers',
            query: $parsed,
            options: $options,
            convert: PortingPhoneNumberListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
