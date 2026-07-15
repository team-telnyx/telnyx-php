<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Storage;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Storage\Cloudfs\CloudfCreateParams\Region;
use Telnyx\Storage\Cloudfs\CloudfListParams\FilterStatus;
use Telnyx\Storage\Cloudfs\CloudfListParams\Sort;
use Telnyx\Storage\Cloudfs\CloudfListResponse;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemDetailResponseWrapper;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemResponseWrapper;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CloudfsContract
{
    /**
     * @api
     *
     * @param string $name Body param: Filesystem name, unique within your organization. Names are trimmed and lowercased; after normalization they may contain lowercase letters, numbers, `.`, `_`, and `-` only.
     * @param Region|value-of<Region> $region body param: Region where the filesystem's storage and metadata are provisioned
     * @param string $idempotencyKey Header param: Unique key that makes the request idempotent (1-255 characters: letters, numbers, `_`, and `-`). Retrying with the same key within 24 hours replays the original response (marked with an `Idempotent-Replayed: true` header) instead of repeating the action. Reusing a key with a different request returns a `422`; sending a key while the original request is still being processed returns a `409`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        Region|string $region,
        string $idempotencyKey,
        RequestOptions|array|null $requestOptions = null,
    ): CloudfsFilesystemResponseWrapper;

    /**
     * @api
     *
     * @param string $id CloudFS filesystem ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CloudfsFilesystemDetailResponseWrapper;

    /**
     * @api
     *
     * @param string $id CloudFS filesystem ID
     * @param string $name New filesystem name, unique within your organization. Names are trimmed and lowercased; after normalization they may contain lowercase letters, numbers, `.`, `_`, and `-` only.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): CloudfsFilesystemDetailResponseWrapper;

    /**
     * @api
     *
     * @param string $filterName return only the filesystem whose name matches exactly
     * @param string $filterRegion return only filesystems in this region
     * @param FilterStatus|value-of<FilterStatus> $filterStatus Return only filesystems with this status. Unrecognized values are ignored.
     * @param string $pageAfter Opaque cursor from a previous response's `meta.cursors.after`; returns the page after it. Mutually exclusive with `page[before]`.
     * @param string $pageBefore Opaque cursor from a previous response's `meta.cursors.before`; returns the page before it. Mutually exclusive with `page[after]`.
     * @param int $pageLimit The number of filesystems to return per page. Values above 250 are treated as 250.
     * @param Sort|value-of<Sort> $sort sort order for the results: a field name for ascending, or the field name prefixed with `-` for descending
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        ?string $filterRegion = null,
        FilterStatus|string|null $filterStatus = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        int $pageLimit = 20,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): CloudfListResponse;

    /**
     * @api
     *
     * @param string $id CloudFS filesystem ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CloudfsFilesystemDetailResponseWrapper;
}
