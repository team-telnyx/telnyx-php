<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserTagsContract;
use Telnyx\UserTags\UserTagListResponse;

final class UserTagsService implements UserTagsContract
{
    /**
     * @api
     */
    public UserTagsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UserTagsRawService($client);
    }

    /**
     * @api
     *
     * List all user tags.
     *
     * @param array{
     *   startsWith?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[starts_with]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?RequestOptions $requestOptions = null
    ): UserTagListResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
