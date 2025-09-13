<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Verifications\ByPhoneNumberContract;
use Telnyx\Services\Verifications\ByPhoneNumber\ActionsService;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse;

final class ByPhoneNumberService implements ByPhoneNumberContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * List verifications by phone number
     *
     * @return ByPhoneNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        string $phoneNumber,
        ?RequestOptions $requestOptions = null
    ): ByPhoneNumberListResponse {
        $params = [];

        return $this->listRaw($phoneNumber, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return ByPhoneNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        string $phoneNumber,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ByPhoneNumberListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['verifications/by_phone_number/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: ByPhoneNumberListResponse::class,
        );
    }
}
