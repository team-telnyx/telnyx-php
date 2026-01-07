<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Page;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CreatedAtShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt
 * @phpstan-import-type FilterShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingOptoutsContract
{
    /**
     * @api
     *
     * @param CreatedAt|CreatedAtShape $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param string $redactionEnabled If receiving address (+E.164 formatted phone number) should be redacted
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<MessagingOptoutListResponse>
     *
     * @throws APIException
     */
    public function list(
        CreatedAt|array|null $createdAt = null,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?string $redactionEnabled = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
