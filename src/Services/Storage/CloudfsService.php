<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\CloudfsContract;
use Telnyx\Services\Storage\Cloudfs\ActionsService;
use Telnyx\Storage\Cloudfs\CloudfCreateParams\Region;
use Telnyx\Storage\Cloudfs\CloudfListParams\FilterStatus;
use Telnyx\Storage\Cloudfs\CloudfListParams\Sort;
use Telnyx\Storage\Cloudfs\CloudfListResponse;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemDetailResponseWrapper;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemResponseWrapper;

/**
 * Manage CloudFS filesystems — JuiceFS-compatible filesystems backed by Telnyx Cloud Storage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CloudfsService implements CloudfsContract
{
    /**
     * @api
     */
    public CloudfsRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CloudfsRawService($client);
        $this->actions = new ActionsService($client);
    }

    /**
     * @api
     *
     * Creates a CloudFS filesystem. Provisioning is synchronous — typically a few seconds, up to a few minutes — and the filesystem is returned with status `ready`, together with its S3 bucket and metadata connection details. This response is the only time the filesystem's `meta_token` — and the credential-bearing `meta_url` — are returned; store them securely. If the token is lost, issue a new one with the rotate-meta-token action. Names are unique within your organization: creating with an existing name returns a `422`. Requests are idempotent: retrying with the same `Idempotency-Key` within 24 hours replays the original response instead of creating another filesystem.
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
    ): CloudfsFilesystemResponseWrapper {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'region' => $region,
                'idempotencyKey' => $idempotencyKey,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a CloudFS filesystem by its ID. The returned `meta_url` omits the credential — the metadata token is only ever returned by create and rotate-meta-token. A filesystem whose last lifecycle action failed includes a customer-safe `error` message.
     *
     * @param string $id CloudFS filesystem ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CloudfsFilesystemDetailResponseWrapper {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a CloudFS filesystem. Only `name` can be changed; other fields are immutable and unknown fields are rejected with a `400`. Renaming to a name that already exists in your organization returns a `422`.
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
    ): CloudfsFilesystemDetailResponseWrapper {
        $params = Util::removeNulls(['name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists the CloudFS filesystems for the authenticated user's organization. Results use cursor-based pagination: fetch the next page by passing `meta.cursors.after` as `page[after]`, or follow the `meta.next` URL.
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
    ): CloudfListResponse {
        $params = Util::removeNulls(
            [
                'filterName' => $filterName,
                'filterRegion' => $filterRegion,
                'filterStatus' => $filterStatus,
                'pageAfter' => $pageAfter,
                'pageBefore' => $pageBefore,
                'pageLimit' => $pageLimit,
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
     * Permanently deletes a CloudFS filesystem, removing its S3 bucket and its metadata database. Deletion is synchronous: the response returns the filesystem's final state with status `deleted`. There is no restore. A filesystem that is still `provisioning` returns a `409`. If the filesystem still contains data, the request may be rejected with a `409` — drain the bucket and retry.
     *
     * @param string $id CloudFS filesystem ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): CloudfsFilesystemDetailResponseWrapper {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
