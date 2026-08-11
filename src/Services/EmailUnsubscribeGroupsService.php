<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force\UnionMember0;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroup;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroupResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailUnsubscribeGroupsContract;
use Telnyx\Services\EmailUnsubscribeGroups\SuppressionsService;

/**
 * Named groups and group-scoped suppressions.
 *
 * @phpstan-import-type ForceShape from \Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailUnsubscribeGroupsService implements EmailUnsubscribeGroupsContract
{
    /**
     * @api
     */
    public EmailUnsubscribeGroupsRawService $raw;

    /**
     * @api
     */
    public SuppressionsService $suppressions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailUnsubscribeGroupsRawService($client);
        $this->suppressions = new SuppressionsService($client);
    }

    /**
     * @api
     *
     * Creates an account-owned unsubscribe group for associating email categories with separate recipient suppression lists.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $description = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnsubscribeGroupResponse {
        $params = Util::removeNulls(
            ['name' => $name, 'description' => $description]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the account-owned unsubscribe group identified by ID.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): UnsubscribeGroupResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partial update (only `name` / `description`). `PUT` is not routed.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $description = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnsubscribeGroupResponse {
        $params = Util::removeNulls(
            ['description' => $description, 'name' => $name]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Offset pagination only (`page[number]` default 1, `page[size]`
     * default 25, max 100). No `sort`/`filter`/cursor — ordering fixed
     * `desc created_at, desc id`. Uses the shared `QueryParser.parse_offset/1`
     * — a malformed `page` (e.g. flat `?page=1` instead of
     * `?page[number]=1`) returns `400` (code `10015`), consistent with
     * `GET /v2/email_blocks`. `meta` includes `total_pages`.
     *
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (1–100, default 25)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<UnsubscribeGroup>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * If the group has 0 active suppressions, hard-deletes the row. With
     * `force=true`, soft-deletes all active suppressions first (status →
     * `removed`, `group_id` cleared, `removed` audit event per block) in a
     * single transaction, then hard-deletes the group. Without `force`
     * and active suppressions present → `409`. Audit trail is preserved.
     * `force` only accepts the string `"true"` or boolean `true`; all other
     * values are false.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param ForceShape $force Force-delete a group with active suppressions. Only `"true"` (string) or `true` (bool) are truthy; all other values are false.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        bool|UnionMember0|string|null $force = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['force' => $force]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
