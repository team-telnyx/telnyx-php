<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingOptouts\MessagingOptoutListParams;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingOptoutsContract;

final class MessagingOptoutsService implements MessagingOptoutsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of opt-out blocks.
     *
     * @param array{
     *   created_at?: array{
     *     gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *   },
     *   filter?: array{from?: string, messaging_profile_id?: string},
     *   page?: array{number?: int, size?: int},
     *   redaction_enabled?: string,
     * }|MessagingOptoutListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingOptoutListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingOptoutListResponse {
        [$parsed, $options] = MessagingOptoutListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<MessagingOptoutListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'messaging_optouts',
            query: $parsed,
            options: $options,
            convert: MessagingOptoutListResponse::class,
        );

        return $response->parse();
    }
}
