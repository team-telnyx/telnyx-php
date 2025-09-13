<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuditEvents\AuditEventListParams;
use Telnyx\AuditEvents\AuditEventListParams\Filter;
use Telnyx\AuditEvents\AuditEventListParams\Page;
use Telnyx\AuditEvents\AuditEventListParams\Sort;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AuditEventsContract;

use const Telnyx\Core\OMIT as omit;

final class AuditEventsService implements AuditEventsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of audit log entries. Audit logs are a best-effort, eventually consistent record of significant account-related changes.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[created_before], filter[created_after]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort set the order of the results by the creation date
     *
     * @return AuditEventListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): AuditEventListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AuditEventListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AuditEventListResponse {
        [$parsed, $options] = AuditEventListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'audit_events',
            query: $parsed,
            options: $options,
            convert: AuditEventListResponse::class,
        );
    }
}
