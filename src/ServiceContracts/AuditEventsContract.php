<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AuditEvents\AuditEventListParams\Sort;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface AuditEventsContract
{
    /**
     * @api
     *
     * @param array{
     *   createdAfter?: string|\DateTimeInterface,
     *   createdBefore?: string|\DateTimeInterface,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[created_before], filter[created_after]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param 'asc'|'desc'|Sort $sort set the order of the results by the creation date
     *
     * @return DefaultPagination<AuditEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
