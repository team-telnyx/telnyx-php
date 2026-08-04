<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailUnsubscribeGroups;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailBlocks\EmailBlock;
use Telnyx\EmailBlocks\EmailBlockResponse;
use Telnyx\EmailUnsubscribeGroups\Suppressions\SuppressionCreateParams;
use Telnyx\EmailUnsubscribeGroups\Suppressions\SuppressionDeleteParams;
use Telnyx\EmailUnsubscribeGroups\Suppressions\SuppressionListParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailUnsubscribeGroups\SuppressionsRawContract;

/**
 * Named groups and group-scoped suppressions.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SuppressionsRawService implements SuppressionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a suppression with `reason: unsubscribe`, `source: manual`,
     * `group_id: <this group>`. All other body fields are ignored; only
     * `to` is read. Idempotent (same dedupe key → `200`, no new event).
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param array{to: string}|SuppressionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|SuppressionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SuppressionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_unsubscribe_groups/%1$s/suppressions', $id],
            body: (object) $parsed,
            options: $options,
            convert: EmailBlockResponse::class,
        );
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
     * @param array{pageNumber?: int, pageSize?: int}|SuppressionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailBlock>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|SuppressionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SuppressionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_unsubscribe_groups/%1$s/suppressions', $id],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: EmailBlock::class,
            page: DefaultFlatPagination::class,
        );
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
     * @param array{id: string}|SuppressionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $email,
        array|SuppressionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SuppressionDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_unsubscribe_groups/%1$s/suppressions/%2$s', $id, $email],
            options: $options,
            convert: null,
        );
    }
}
