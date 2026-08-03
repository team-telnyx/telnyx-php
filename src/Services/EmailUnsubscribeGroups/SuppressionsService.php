<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailUnsubscribeGroups;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailBlocks\EmailBlock;
use Telnyx\EmailBlocks\EmailBlockResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailUnsubscribeGroups\SuppressionsContract;

/**
 * Named groups and group-scoped suppressions.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SuppressionsService implements SuppressionsContract
{
    /**
     * @api
     */
    public SuppressionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SuppressionsRawService($client);
    }

    /**
     * @api
     *
     * Creates a suppression with `reason: unsubscribe`, `source: manual`,
     * `group_id: <this group>`. All other body fields are ignored; only
     * `to` is read. Idempotent (same dedupe key → `200`, no new event).
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        string $to,
        RequestOptions|array|null $requestOptions = null
    ): EmailBlockResponse {
        $params = Util::removeNulls(['to' => $to]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Account + group scoped. Offset pagination only (`page[number]`
     * default 1, `page[size]` default 25, max 100). No `sort`/`filter`/
     * cursor — ordering fixed `desc created_at, desc id`. Uses the shared
     * `QueryParser.parse_offset/1` — a malformed `page` returns `400`
     * (code `10015`), consistent with `GET /v2/email_blocks`. `meta`
     * includes `total_pages`. Rows reuse the standard suppression shape
     * (`group_id` set to this group).
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (1–100, default 25)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EmailBlock>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        int $pageNumber = 1,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Soft-deletes all active blocks for (account, group, normalized
     * email) — one `removed` audit event per block (`actor: manual`).
     * The `email` path segment is normalized (trim + lower-case) before
     * matching. Idempotent on already-removed rows (returns `404` since
     * they're no longer `active`).
     *
     * Two distinct `404` cases: a missing/cross-account **group** returns
     * `10001 "The requested unsubscribe group was not found"`; a group that
     * exists but has **no active suppression** for that email returns
     * `10001 "The requested group suppression was not found"`.
     *
     * @param string $email recipient address (normalized: trim + lower-case before matching)
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $email,
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($email, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
