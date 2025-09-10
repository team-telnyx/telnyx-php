<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\UserTags\UserTagListParams\Filter;
use Telnyx\UserTags\UserTagListResponse;

use const Telnyx\Core\OMIT as omit;

interface UserTagsContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[starts_with]
     */
    public function list(
        $filter = omit,
        ?RequestOptions $requestOptions = null
    ): UserTagListResponse;
}
