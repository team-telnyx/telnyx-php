<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupCreateParams;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupListParams;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupUpdateParams;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroup;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroupResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailUnsubscribeGroupsRawContract;

/**
 * Named groups and group-scoped suppressions.
 *
 * @phpstan-import-type ForceShape from \Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailUnsubscribeGroupsRawService implements EmailUnsubscribeGroupsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an account-owned unsubscribe group for associating email categories with separate recipient suppression lists.
     *
     * @param array{
     *   name: string, description?: string|null
     * }|EmailUnsubscribeGroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnsubscribeGroupResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailUnsubscribeGroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailUnsubscribeGroupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_unsubscribe_groups',
            body: (object) $parsed,
            options: $options,
            convert: UnsubscribeGroupResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the account-owned unsubscribe group identified by ID.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnsubscribeGroupResponse>
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
            path: ['email_unsubscribe_groups/%1$s', $id],
            options: $requestOptions,
            convert: UnsubscribeGroupResponse::class,
        );
    }

    /**
     * @api
     *
     * Partial update (only `name` / `description`). `PUT` is not routed.
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param array{
     *   description?: string|null, name?: string
     * }|EmailUnsubscribeGroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnsubscribeGroupResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|EmailUnsubscribeGroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailUnsubscribeGroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['email_unsubscribe_groups/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: UnsubscribeGroupResponse::class,
        );
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
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|EmailUnsubscribeGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<UnsubscribeGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailUnsubscribeGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailUnsubscribeGroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_unsubscribe_groups',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: UnsubscribeGroup::class,
            page: DefaultFlatPagination::class,
        );
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
     * @param array{force?: ForceShape}|EmailUnsubscribeGroupDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|EmailUnsubscribeGroupDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailUnsubscribeGroupDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_unsubscribe_groups/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: null,
        );
    }
}
