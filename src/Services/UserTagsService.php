<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserTagsContract;
use Telnyx\UserTags\UserTagListParams;
use Telnyx\UserTags\UserTagListResponse;

final class UserTagsService implements UserTagsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all user tags.
     *
     * @param array{filter?: array{starts_with?: string}}|UserTagListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|UserTagListParams $params,
        ?RequestOptions $requestOptions = null
    ): UserTagListResponse {
        [$parsed, $options] = UserTagListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'user_tags',
            query: $parsed,
            options: $options,
            convert: UserTagListResponse::class,
        );
    }
}
