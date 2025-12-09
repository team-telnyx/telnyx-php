<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ByPhoneNumberRawContract;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse;

final class ByPhoneNumberRawService implements ByPhoneNumberRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List verifications by phone number
     *
     * @param string $phoneNumber +E164 formatted phone number
     *
     * @return BaseResponse<ByPhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['verifications/by_phone_number/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: ByPhoneNumberListResponse::class,
        );
    }
}
