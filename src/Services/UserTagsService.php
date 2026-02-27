<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\UserTagsContract;
use Telnyx\UserTags\UserTagListParams\Filter;
use Telnyx\UserTags\UserTagListResponse;

/**
 * User-defined tags for Telnyx resources.
 *
 * @phpstan-import-type FilterShape from \Telnyx\UserTags\UserTagListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[starts_with]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        RequestOptions|array|null $requestOptions = null,
    ): UserTagListResponse {
        $params = Util::removeNulls(['filter' => $filter]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
