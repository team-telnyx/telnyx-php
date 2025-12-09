<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
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
     *   createdAt?: array{
     *     gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     *   },
     *   filter?: array{from?: string, messagingProfileID?: string},
     *   page?: array{number?: int, size?: int},
     *   redactionEnabled?: string,
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
            query: Util::array_transform_keys(
                $parsed,
                [
                    'createdAt' => 'created_at', 'redactionEnabled' => 'redaction_enabled',
                ],
            ),
            options: $options,
            convert: MessagingOptoutListResponse::class,
        );

        return $response->parse();
    }
}
