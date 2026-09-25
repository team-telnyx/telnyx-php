<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryGetResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryListParams;
use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryListResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\Namespaces\Profiles\MemoriesRawContract;

/**
 * What a namespace and a profile hold.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MemoriesRawService implements MemoriesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * One memory by its id, as `recall` and the listing return it, together with what it came from. A fact names its `source_id`: read it with `GET .../sources/{source_id}` to see what was stored. A memory derived from other memories names them in `derived_from` instead; read each of those to reach its source.
     *
     * @param string $memoryID a memory's id, as `recall` and the listing return it
     * @param array{namespace: string, profileID: string}|MemoryRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MemoryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $memoryID,
        array|MemoryRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MemoryRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);
        $profileID = $parsed['profileID'];
        unset($parsed['profileID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'ai/memory/namespaces/%1$s/profiles/%2$s/memories/%3$s',
                $namespace,
                $profileID,
                $memoryID,
            ],
            options: $options,
            convert: MemoryGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Everything stored under one profile, unranked -- ask `recall` for the memories that answer a question. A profile that holds nothing is an empty page rather than a 404: profiles exist by being written to. Each memory names the `source_id` it was extracted from, or null for a memory derived from other memories -- which can read almost the same as the fact it restates. A `source_id` narrows the listing to the memories extracted from that source, and a `session_id` to those extracted from the session, which is the same thing named another way; pass one or the other. Neither is everything the source led to: a memory derived from several sources belongs to no single one and appears only in the unfiltered listing. A memory written while the listing is paged shifts the pages after it, so an entry can be repeated or missed at a page boundary.
     *
     * @param string $profileID Path param
     * @param array{
     *   namespace: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sessionID?: string|null,
     *   sourceID?: string|null,
     * }|MemoryListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MemoryListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        array|MemoryListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MemoryListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'ai/memory/namespaces/%1$s/profiles/%2$s/memories',
                $namespace,
                $profileID,
            ],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'sessionID' => 'session_id',
                    'sourceID' => 'source_id',
                ],
            ),
            options: $options,
            convert: MemoryListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
