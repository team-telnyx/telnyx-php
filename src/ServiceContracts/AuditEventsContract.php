<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AuditEvents\AuditEventListParams\Filter;
use Telnyx\AuditEvents\AuditEventListParams\Page;
use Telnyx\AuditEvents\AuditEventListParams\Sort;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\AuditEvents\AuditEventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\AuditEvents\AuditEventListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AuditEventsContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[created_before], filter[created_after]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort set the order of the results by the creation date
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<AuditEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
