<?php

declare(strict_types=1);

namespace Telnyx\Services\Verifications;

use Telnyx\Client;
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
        $this->actions = new ActionsService($this->client);
    }

    /**
     * @api
     *
     * List verifications by phone number
     */
    public function list(
        string $phoneNumber,
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
