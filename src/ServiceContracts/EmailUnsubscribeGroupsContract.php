<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force\UnionMember0;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroup;
use Telnyx\EmailUnsubscribeGroups\UnsubscribeGroupResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ForceShape from \Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailUnsubscribeGroupsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $description = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnsubscribeGroupResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): UnsubscribeGroupResponse;

    /**
     * @api
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
    ): UnsubscribeGroupResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
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
    ): mixed;
}
