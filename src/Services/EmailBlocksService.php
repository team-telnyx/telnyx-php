<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailBlocks\EmailBlock;
use Telnyx\EmailBlocks\EmailBlockGetEventsResponse;
use Telnyx\EmailBlocks\EmailBlockListParams\FilterReason;
use Telnyx\EmailBlocks\EmailBlockListParams\Sort;
use Telnyx\EmailBlocks\EmailBlockResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailBlocksContract;
use Telnyx\Services\EmailBlocks\ImportService;

/**
 * Recipient suppression records (`/v2/email_blocks`).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailBlocksService implements EmailBlocksContract
{
    /**
     * @api
     */
    public EmailBlocksRawService $raw;

    /**
     * @api
     */
    public ImportService $import;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailBlocksRawService($client);
        $this->import = new ImportService($client);
    }

    /**
     * @api
     *
     * Creates a suppression with `reason: manual_block` and `source: manual`.
     * Caller-supplied `reason` / `source` are **ignored**; `scope` is
     * **derived** server-side from `domain_id` / `from` and is never
     * trusted. Idempotent: if a matching row already exists (NULL-safe
     * dedupe key: account_id, scope, to, reason, domain_id, from),
     * returns the existing record with `200` (no new audit event).
     *
     * `bounce_category`, `dsn_code`, `meta`, and `group_id` are **not
     * accepted** on the public surface. Use the unsubscribe-group
     * suppression endpoint or the internal create surface for those.
     *
     * @param string $to recipient address (normalized: trim + lower-case)
     * @param string|null $domainID `null` ⇒ account scope
     * @param string|null $from Sender address (normalized). `null` ⇒ account/domain scope.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $to,
        ?string $domainID = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailBlockResponse {
        $params = Util::removeNulls(
            [
                'to' => $to,
                'domainID' => $domainID,
                'expiresAt' => $expiresAt,
                'from' => $from,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the account-owned suppression identified by ID. Cross-account lookups and malformed IDs return `404` without exposing another account’s data.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailBlockResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Account-scoped list. Two mutually exclusive pagination modes:
     *
     *   - **Offset**: `page[number]` (default 1) + `page[size]`
     *     (default 25, max 100). `meta` contains `total_pages`.
     *   - **Cursor**: `page[after]` and/or `page[before]` (opaque
     *     `Base.url_encode64` of `{"created_at","id"}`). Cannot combine
     *     with `page[number]`; `after`+`before` together is an error.
     *     `meta` contains `next_cursor` / `previous_cursor` (omitted when
     *     their flag is false).
     *
     * Sort defaults to `-created_at` (desc); only `created_at` is sortable.
     * A `--` prefix is an error. `nil`/empty filter values are silently dropped.
     *
     * @param \DateTimeInterface $filterCreatedAfter `created_at > value` (ISO 8601)
     * @param \DateTimeInterface $filterCreatedBefore `created_at < value` (ISO 8601)
     * @param string $filterDomainID exact-match filter on domain_id (UUID)
     * @param FilterReason|value-of<FilterReason> $filterReason exact-match filter on reason
     * @param string $pageAfter Opaque cursor (`Base.url_encode64` of `{"created_at","id"}`). Cursor mode; mutually exclusive with `page[number]` and `page[before]`.
     * @param string $pageBefore Opaque cursor (see `page[after]`). Mutually exclusive with `page[after]` and `page[number]`.
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (1–100, default 25)
     * @param Sort|value-of<Sort> $sort Sort field. Leading `-` = desc; only `created_at` is sortable. Default `-created_at`. `--` is an error.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EmailBlock>
     *
     * @throws APIException
     */
    public function list(
        ?\DateTimeInterface $filterCreatedAfter = null,
        ?\DateTimeInterface $filterCreatedBefore = null,
        ?string $filterDomainID = null,
        FilterReason|string|null $filterReason = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        int $pageNumber = 1,
        int $pageSize = 25,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterCreatedAfter' => $filterCreatedAfter,
                'filterCreatedBefore' => $filterCreatedBefore,
                'filterDomainID' => $filterDomainID,
                'filterReason' => $filterReason,
                'pageAfter' => $pageAfter,
                'pageBefore' => $pageBefore,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Soft-deletes (status → `removed`; tombstone retained). A `removed`
     * audit event is appended unless the block was already `removed`
     * (idempotent — returns the existing row with `200` and no new event).
     * Mutates `updated_at`.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailBlockResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Offset pagination only (`page[number]` default 1, `page[size]`
     * default **50**, max 100). No `sort`, no `filter`, no cursor —
     * ordering is fixed `desc occurred_at, desc id`. Verifies the block
     * belongs to the account first (cross-account → 404).
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (default 50, max 100)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveEvents(
        string $id,
        int $pageNumber = 1,
        int $pageSize = 50,
        RequestOptions|array|null $requestOptions = null,
    ): EmailBlockGetEventsResponse {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveEvents($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Streams the account's suppressions as a chunked CSV (server-side
     * cursor; never materialized). Content-type `text/csv`, header
     * `Content-Disposition: attachment; filename="email_blocks_export.csv"`.
     *
     * Filters (`filter[reason]`, `filter[domain_id]`,
     * `filter[created_after]`, `filter[created_before]`) are the only
     * params that affect output. `sort` and `page[*]` are **parsed**
     * (bad values still produce `400`) but **ignored** — rows stream
     * `ORDER BY created_at ASC, id ASC` with no pagination.
     *
     * CSV columns: `id,to,from,reason,source,scope,status,domain_id,
     * created_at,updated_at,expires_at,group_id`. The CSV carries the
     * `group_id` column so group-scoped suppressions' group link survives
     * the export (empty for account-scope rows).
     *
     * @param \DateTimeInterface $filterCreatedAfter `created_at > value` (ISO 8601)
     * @param \DateTimeInterface $filterCreatedBefore `created_at < value` (ISO 8601)
     * @param string $filterDomainID exact-match filter on domain_id (UUID)
     * @param \Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\FilterReason|value-of<\Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\FilterReason> $filterReason exact-match filter on reason
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (1–100, default 25)
     * @param \Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\Sort|value-of<\Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\Sort> $sort Sort field. Leading `-` = desc; only `created_at` is sortable. Default `-created_at`. `--` is an error.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveExport(
        ?\DateTimeInterface $filterCreatedAfter = null,
        ?\DateTimeInterface $filterCreatedBefore = null,
        ?string $filterDomainID = null,
        \Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\FilterReason|string|null $filterReason = null,
        int $pageNumber = 1,
        int $pageSize = 25,
        \Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'filterCreatedAfter' => $filterCreatedAfter,
                'filterCreatedBefore' => $filterCreatedBefore,
                'filterDomainID' => $filterDomainID,
                'filterReason' => $filterReason,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveExport(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
