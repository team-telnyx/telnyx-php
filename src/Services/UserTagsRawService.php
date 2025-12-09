<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserTagsRawContract;
use Telnyx\UserTags\UserTagListParams;
use Telnyx\UserTags\UserTagListResponse;

final class UserTagsRawService implements UserTagsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all user tags.
     *
     * @param array{filter?: array{startsWith?: string}}|UserTagListParams $params
     *
     * @return BaseResponse<UserTagListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|UserTagListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
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
