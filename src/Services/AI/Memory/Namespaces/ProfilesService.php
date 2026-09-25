<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory\Namespaces;

use Telnyx\AI\Memory\Namespaces\Profiles\ProfileDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileGetSummaryResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileListResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRecallResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRememberResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\Namespaces\ProfilesContract;
use Telnyx\Services\AI\Memory\Namespaces\Profiles\MemoriesService;
use Telnyx\Services\AI\Memory\Namespaces\Profiles\SourcesService;

/**
 * @phpstan-import-type BodyShape from \Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestParams\Body
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ProfilesService implements ProfilesContract
{
    /**
     * @api
     */
    public ProfilesRawService $raw;

    /**
     * @api
     */
    public MemoriesService $memories;

    /**
     * @api
     */
    public SourcesService $sources;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ProfilesRawService($client);
        $this->memories = new MemoriesService($client);
        $this->sources = new SourcesService($client);
    }

    /**
     * @api
     *
     * Profiles are never created, only written to, so this lists the ones that hold a memory. A profile whose first ingest is still running is not here yet. Ordered by memory count, largest first, so a profile written to while the listing is paged can move between pages and be repeated or missed.
     *
     * @param int $pageNumber The page to return, counting from 1. Bounded in depth: (page[number] - 1) * page[size] may be at most 10000.
     * @param int $pageSize how many results a page holds
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ProfileListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $namespace,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($namespace, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete everything held about one profile. A 2xx means none of its memories are left, and its summary goes with them. There is no undo.
     *
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $profileID,
        string $namespace,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileDeleteResponse {
        $params = ['namespace' => $namespace];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Store a session. Facts are extracted from whatever you send — the body is taken as any JSON value and stored whole, so a framework's own transcript shape works unchanged. `messages` of `role`/`content` is the conventional shape, not a requirement. An empty object or a null body is refused. Carry a `session_id` to name the session: re-ingesting the same one replaces what it held. Omit it and a session is opened and returned. Extraction runs asynchronously — poll the returned operation.
     *
     * @param string $profileID Path param
     * @param string $namespace Path param
     * @param BodyShape $body Body param
     * @param string|Omitted|null $sessionID Query param: Names the session. Re-ingesting the same session replaces what it held and keeps its `source_id`. Omit it to have one derived from the content and returned. No whitespace, control characters, or any of / \ # ? %.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function ingest(
        string $profileID,
        string $namespace,
        string|float|bool|array $body,
        string|Omitted|null $sessionID = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileIngestResponse {
        $params = array_filter(
            ['namespace' => $namespace, 'body' => $body, 'sessionID' => $sessionID],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->ingest($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Ranked memories for a question. Matching runs over the profile's memories and returns them in rank order with a relevance `score`; the score is null where the deployment's reranker is a passthrough, in which case order is the only signal. No model runs in this path — recall returns facts, it does not compose an answer.
     *
     * @param string $profileID Path param
     * @param string $namespace Path param
     * @param string $query Body param
     * @param int|Omitted|null $topK Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function recall(
        string $profileID,
        string $namespace,
        string $query,
        int|Omitted|null $topK = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileRecallResponse {
        $params = array_filter(
            ['namespace' => $namespace, 'query' => $query, 'topK' => $topK],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->recall($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * For a fact the agent has already distilled: `text` is stored as given, with nothing extracted from it. Send a transcript to `ingest` instead. Remembering the same text again writes the same memory rather than a second copy of it, so a retry is safe. The write runs asynchronously -- poll the returned operation.
     *
     * @param string $profileID Path param
     * @param string $namespace Path param
     * @param string $text Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remember(
        string $profileID,
        string $namespace,
        string $text,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileRememberResponse {
        $params = ['namespace' => $namespace, 'text' => $text];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->remember($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * The whole profile as one card, precomputed, with no query. Built for the start of a session, where there is no question to ask yet.
     *
     * A summary is generated in the background. `is_stale` tells you newer memories have arrived since it was written; that is ordinary and the card is still usable.
     *
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSummary(
        string $profileID,
        string $namespace,
        RequestOptions|array|null $requestOptions = null,
    ): ProfileGetSummaryResponse {
        $params = ['namespace' => $namespace];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveSummary($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
