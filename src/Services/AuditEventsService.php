<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuditEvents\AuditEventListParams\Filter;
use Telnyx\AuditEvents\AuditEventListParams\Page;
use Telnyx\AuditEvents\AuditEventListParams\Sort;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AuditEventsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\AuditEvents\AuditEventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\AuditEvents\AuditEventListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AuditEventsService implements AuditEventsContract
{
    /**
     * @api
     */
    public AuditEventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuditEventsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of audit log entries. Audit logs are a best-effort, eventually consistent record of significant account-related changes.
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
    ): DefaultPagination {
        $params = Util::removeNulls(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
