<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuditEvents\AuditEventListParams;
use Telnyx\AuditEvents\AuditEventListParams\Filter;
use Telnyx\AuditEvents\AuditEventListParams\Page;
use Telnyx\AuditEvents\AuditEventListParams\Sort;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AuditEventsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\AuditEvents\AuditEventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\AuditEvents\AuditEventListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AuditEventsRawService implements AuditEventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of audit log entries. Audit logs are a best-effort, eventually consistent record of significant account-related changes.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|AuditEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<AuditEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|AuditEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuditEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'audit_events',
            query: $parsed,
            options: $options,
            convert: AuditEventListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
