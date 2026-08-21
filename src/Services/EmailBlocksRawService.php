<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailBlocks\EmailBlock;
use Telnyx\EmailBlocks\EmailBlockCreateParams;
use Telnyx\EmailBlocks\EmailBlockGetEventsResponse;
use Telnyx\EmailBlocks\EmailBlockListParams;
use Telnyx\EmailBlocks\EmailBlockListParams\FilterReason;
use Telnyx\EmailBlocks\EmailBlockListParams\Sort;
use Telnyx\EmailBlocks\EmailBlockResponse;
use Telnyx\EmailBlocks\EmailBlockRetrieveEventsParams;
use Telnyx\EmailBlocks\EmailBlockRetrieveExportParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailBlocksRawContract;

/**
 * Recipient suppression records (`/v2/email_blocks`).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailBlocksRawService implements EmailBlocksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   to: string,
     *   domainID?: string|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   from?: string|null,
     * }|EmailBlockCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailBlockCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailBlockCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_blocks',
            body: (object) $parsed,
            options: $options,
            convert: EmailBlockResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the account-owned suppression identified by ID. Cross-account lookups and malformed IDs return `404` without exposing another account’s data.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_blocks/%1$s', $id],
            options: $requestOptions,
            convert: EmailBlockResponse::class,
        );
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
     * @param array{
     *   filterCreatedAfter?: \DateTimeInterface,
     *   filterCreatedBefore?: \DateTimeInterface,
     *   filterDomainID?: string,
     *   filterReason?: FilterReason|value-of<FilterReason>,
     *   pageAfter?: string,
     *   pageBefore?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|EmailBlockListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailBlock>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailBlockListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailBlockListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_blocks',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCreatedAfter' => 'filter[created_after]',
                    'filterCreatedBefore' => 'filter[created_before]',
                    'filterDomainID' => 'filter[domain_id]',
                    'filterReason' => 'filter[reason]',
                    'pageAfter' => 'page[after]',
                    'pageBefore' => 'page[before]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: EmailBlock::class,
            page: DefaultFlatPagination::class,
        );
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
     * @return BaseResponse<EmailBlockResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_blocks/%1$s', $id],
            options: $requestOptions,
            convert: EmailBlockResponse::class,
        );
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
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|EmailBlockRetrieveEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailBlockGetEventsResponse>>
     *
     * @throws APIException
     */
    public function retrieveEvents(
        string $id,
        array|EmailBlockRetrieveEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailBlockRetrieveEventsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_blocks/%1$s/events', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: EmailBlockGetEventsResponse::class,
            page: DefaultFlatPagination::class,
        );
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
     * @param array{
     *   filterCreatedAfter?: \DateTimeInterface,
     *   filterCreatedBefore?: \DateTimeInterface,
     *   filterDomainID?: string,
     *   filterReason?: EmailBlockRetrieveExportParams\FilterReason|value-of<EmailBlockRetrieveExportParams\FilterReason>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: EmailBlockRetrieveExportParams\Sort|value-of<EmailBlockRetrieveExportParams\Sort>,
     * }|EmailBlockRetrieveExportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveExport(
        array|EmailBlockRetrieveExportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailBlockRetrieveExportParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_blocks/export',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCreatedAfter' => 'filter[created_after]',
                    'filterCreatedBefore' => 'filter[created_before]',
                    'filterDomainID' => 'filter[domain_id]',
                    'filterReason' => 'filter[reason]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            headers: ['Accept' => 'text/csv'],
            options: $options,
            convert: 'string',
        );
    }
}
