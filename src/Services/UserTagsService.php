<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserTagsContract;
use Telnyx\UserTags\UserTagListParams;
use Telnyx\UserTags\UserTagListParams\Filter;
use Telnyx\UserTags\UserTagListResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[starts_with]
     *
     * @return UserTagListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): UserTagListResponse {
        [$parsed, $options] = UserTagListParams::parseRequest(
            ['filter' => $filter],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'user_tags',
            query: $parsed,
            options: $options,
            convert: UserTagListResponse::class,
        );
    }
}
