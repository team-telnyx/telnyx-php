<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Collections\Sources\Source;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceDeleteParams;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceListParams;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceRetrieveParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\Namespaces\Profiles\SourcesRawContract;

/**
 * What a profile stored, and what its memories came from.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SourcesRawService implements SourcesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * One source and its content, as it was stored: an ingested session's payload or a remembered fact. A source whose ingest is still queued answers 404 until it has been stored.
     *
     * @param string $sourceID Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     * @param array{namespace: string, profileID: string}|SourceRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $sourceID,
        array|SourceRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceRetrieveParams::parseRequest(
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
                'ai/memory/namespaces/%1$s/profiles/%2$s/sources/%3$s',
                $namespace,
                $profileID,
                $sourceID,
            ],
            options: $options,
            convert: SourceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Everything a profile has stored and extracts memories from: each ingested session, and each remembered fact, which has no session. Content is not listed; read one source for it. A source whose ingest is still queued is not here yet. Re-ingesting a session moves it to the front, so a listing paged while sessions are written can repeat or miss one at a page boundary. A `session_id` narrows the listing to the source that session was stored as: one source or none, and none -- an empty page, not a 404 -- for a session never ingested, still queued, or another profile's.
     *
     * @param string $profileID Path param
     * @param array{
     *   namespace: string, pageNumber?: int, pageSize?: int, sessionID?: string|null
     * }|SourceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Source>>
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        array|SourceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceListParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'ai/memory/namespaces/%1$s/profiles/%2$s/sources',
                $namespace,
                $profileID,
            ],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'sessionID' => 'session_id',
                ],
            ),
            options: $options,
            convert: Source::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes one source -- an ingested session or a remembered fact -- together with the memories derived from it. A memory derived from this source and others is deleted too, and derived again from what remains in the background. It answers only once the source is gone. A source that is not there -- never stored, another profile's, or already deleted -- answers 404, so on a `502` or a `504` repeat the identical request and read a 404 as done. An ingest of the same session that is still queued is not cancelled, and stores the session again when it runs. Nothing here can be undone.
     *
     * @param string $sourceID Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     * @param array{namespace: string, profileID: string}|SourceDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $sourceID,
        array|SourceDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);
        $profileID = $parsed['profileID'];
        unset($parsed['profileID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'ai/memory/namespaces/%1$s/profiles/%2$s/sources/%3$s',
                $namespace,
                $profileID,
                $sourceID,
            ],
            options: $options,
            convert: SourceDeleteResponse::class,
        );
    }
}
