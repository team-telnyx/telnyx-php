<?php

declare(strict_types=1);

namespace Telnyx\Services\Storage;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Storage\CloudfsRawContract;
use Telnyx\Storage\Cloudfs\CloudfCreateParams;
use Telnyx\Storage\Cloudfs\CloudfCreateParams\Region;
use Telnyx\Storage\Cloudfs\CloudfListParams;
use Telnyx\Storage\Cloudfs\CloudfListParams\FilterStatus;
use Telnyx\Storage\Cloudfs\CloudfListParams\Sort;
use Telnyx\Storage\Cloudfs\CloudfListResponse;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemDetailResponseWrapper;
use Telnyx\Storage\Cloudfs\CloudfsFilesystemResponseWrapper;
use Telnyx\Storage\Cloudfs\CloudfUpdateParams;

/**
 * Manage CloudFS filesystems — JuiceFS-compatible filesystems backed by Telnyx Cloud Storage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CloudfsRawService implements CloudfsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a CloudFS filesystem. Provisioning is synchronous — typically a few seconds, up to a few minutes — and the filesystem is returned with status `ready`, together with its S3 bucket and metadata connection details. This response is the only time the filesystem's `meta_token` — and the credential-bearing `meta_url` — are returned; store them securely. If the token is lost, issue a new one with the rotate-meta-token action. Names are unique within your organization: creating with an existing name returns a `422`. Requests are idempotent: retrying with the same `Idempotency-Key` within 24 hours replays the original response instead of creating another filesystem.
     *
     * @param array{
     *   name: string, region: Region|value-of<Region>, idempotencyKey: string
     * }|CloudfCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemResponseWrapper>
     *
     * @throws APIException
     */
    public function create(
        array|CloudfCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CloudfCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'storage/cloudfs',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: CloudfsFilesystemResponseWrapper::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a CloudFS filesystem by its ID. The returned `meta_url` omits the credential — the metadata token is only ever returned by create and rotate-meta-token. A filesystem whose last lifecycle action failed includes a customer-safe `error` message.
     *
     * @param string $id CloudFS filesystem ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemDetailResponseWrapper>
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
            path: ['storage/cloudfs/%1$s', $id],
            options: $requestOptions,
            convert: CloudfsFilesystemDetailResponseWrapper::class,
        );
    }

    /**
     * @api
     *
     * Updates a CloudFS filesystem. Only `name` can be changed; other fields are immutable and unknown fields are rejected with a `400`. Renaming to a name that already exists in your organization returns a `422`.
     *
     * @param string $id CloudFS filesystem ID
     * @param array{name?: string}|CloudfUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemDetailResponseWrapper>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CloudfUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CloudfUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['storage/cloudfs/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CloudfsFilesystemDetailResponseWrapper::class,
        );
    }

    /**
     * @api
     *
     * Lists the CloudFS filesystems for the authenticated user's organization. Results use cursor-based pagination: fetch the next page by passing `meta.cursors.after` as `page[after]`, or follow the `meta.next` URL.
     *
     * @param array{
     *   filterName?: string,
     *   filterRegion?: string,
     *   filterStatus?: FilterStatus|value-of<FilterStatus>,
     *   pageAfter?: string,
     *   pageBefore?: string,
     *   pageLimit?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|CloudfListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CloudfListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CloudfListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'storage/cloudfs',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterName' => 'filter[name]',
                    'filterRegion' => 'filter[region]',
                    'filterStatus' => 'filter[status]',
                    'pageAfter' => 'page[after]',
                    'pageBefore' => 'page[before]',
                    'pageLimit' => 'page[limit]',
                ],
            ),
            options: $options,
            convert: CloudfListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes a CloudFS filesystem, removing its S3 bucket and its metadata database. Deletion is synchronous: the response returns the filesystem's final state with status `deleted`. There is no restore. A filesystem that is still `provisioning` returns a `409`. If the filesystem still contains data, the request may be rejected with a `409` — drain the bucket and retry.
     *
     * @param string $id CloudFS filesystem ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CloudfsFilesystemDetailResponseWrapper>
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
            path: ['storage/cloudfs/%1$s', $id],
            options: $requestOptions,
            convert: CloudfsFilesystemDetailResponseWrapper::class,
        );
    }
}
