<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\UserTags\UserTagListResponse;

interface UserTagsContract
{
    /**
     * @api
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
    ): UserTagListResponse;
}
