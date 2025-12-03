<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuditEvents\AuditEventListParams;
use Telnyx\AuditEvents\AuditEventListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AuditEventsContract;

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
     * @param array{
     *   filter?: array{
     *     created_after?: string|\DateTimeInterface,
     *     created_before?: string|\DateTimeInterface,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: 'asc'|'desc',
     * }|AuditEventListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AuditEventListParams $params,
        ?RequestOptions $requestOptions = null
    ): AuditEventListResponse {
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
        );
    }
}
