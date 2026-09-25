<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory\Namespaces;

use Telnyx\AI\Memory\Namespaces\Profiles\ProfileDeleteParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileGetSummaryResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileListParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileListResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRecallParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRecallResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRememberParams;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRememberResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRetrieveSummaryParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\Namespaces\ProfilesRawContract;

/**
 * @phpstan-import-type BodyShape from \Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestParams\Body
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ProfilesRawService implements ProfilesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Profiles are never created, only written to, so this lists the ones that hold a memory. A profile whose first ingest is still running is not here yet. Ordered by memory count, largest first, so a profile written to while the listing is paged can move between pages and be repeated or missed.
     *
     * @param array{pageNumber?: int, pageSize?: int}|ProfileListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ProfileListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $namespace,
        array|ProfileListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/memory/namespaces/%1$s/profiles', $namespace],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ProfileListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete everything held about one profile. A 2xx means none of its memories are left, and its summary goes with them. There is no undo.
     *
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param array{namespace: string}|ProfileDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $profileID,
        array|ProfileDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/memory/namespaces/%1$s/profiles/%2$s', $namespace, $profileID],
            options: $options,
            convert: ProfileDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Store a session. Facts are extracted from whatever you send — the body is taken as any JSON value and stored whole, so a framework's own transcript shape works unchanged. `messages` of `role`/`content` is the conventional shape, not a requirement. An empty object or a null body is refused. Carry a `session_id` to name the session: re-ingesting the same one replaces what it held. Omit it and a session is opened and returned. Extraction runs asynchronously — poll the returned operation.
     *
     * @param string $profileID Path param
     * @param array{
     *   namespace: string, body: BodyShape, sessionID?: string|null
     * }|ProfileIngestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileIngestResponse>
     *
     * @throws APIException
     */
    public function ingest(
        string $profileID,
        array|ProfileIngestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileIngestParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);

        /** @var array<string,mixed> */
        $body = $parsed['body'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'ai/memory/namespaces/%1$s/profiles/%2$s/ingest', $namespace, $profileID,
            ],
            query: Util::array_transform_keys(
                array_diff_key($parsed, array_flip(['body'])),
                ['sessionID' => 'session_id'],
            ),
            body: array_diff_key($body, array_flip(['namespace'])),
            options: $options,
            convert: ProfileIngestResponse::class,
        );
    }

    /**
     * @api
     *
     * Ranked memories for a question. Matching runs over the profile's memories and returns them in rank order with a relevance `score`; the score is null where the deployment's reranker is a passthrough, in which case order is the only signal. No model runs in this path — recall returns facts, it does not compose an answer.
     *
     * @param string $profileID Path param
     * @param array{
     *   namespace: string, query: string, topK?: int|null
     * }|ProfileRecallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileRecallResponse>
     *
     * @throws APIException
     */
    public function recall(
        string $profileID,
        array|ProfileRecallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileRecallParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'ai/memory/namespaces/%1$s/profiles/%2$s/recall', $namespace, $profileID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['namespace'])),
            options: $options,
            convert: ProfileRecallResponse::class,
        );
    }

    /**
     * @api
     *
     * For a fact the agent has already distilled: `text` is stored as given, with nothing extracted from it. Send a transcript to `ingest` instead. Remembering the same text again writes the same memory rather than a second copy of it, so a retry is safe. The write runs asynchronously -- poll the returned operation.
     *
     * @param string $profileID Path param
     * @param array{namespace: string, text: string}|ProfileRememberParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileRememberResponse>
     *
     * @throws APIException
     */
    public function remember(
        string $profileID,
        array|ProfileRememberParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileRememberParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'ai/memory/namespaces/%1$s/profiles/%2$s/remember',
                $namespace,
                $profileID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['namespace'])),
            options: $options,
            convert: ProfileRememberResponse::class,
        );
    }

    /**
     * @api
     *
     * The whole profile as one card, precomputed, with no query. Built for the start of a session, where there is no question to ask yet.
     *
     * A summary is generated in the background. `is_stale` tells you newer memories have arrived since it was written; that is ordinary and the card is still usable.
     *
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param array{namespace: string}|ProfileRetrieveSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileGetSummaryResponse>
     *
     * @throws APIException
     */
    public function retrieveSummary(
        string $profileID,
        array|ProfileRetrieveSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ProfileRetrieveSummaryParams::parseRequest(
            $params,
            $requestOptions,
        );
        $namespace = $parsed['namespace'];
        unset($parsed['namespace']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'ai/memory/namespaces/%1$s/profiles/%2$s/summary',
                $namespace,
                $profileID,
            ],
            options: $options,
            convert: ProfileGetSummaryResponse::class,
        );
    }
}
