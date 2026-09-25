<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Collections\Sources\Source;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\Namespaces\Profiles\SourcesContract;

/**
 * What a profile stored, and what its memories came from.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SourcesService implements SourcesContract
{
    /**
     * @api
     */
    public SourcesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SourcesRawService($client);
    }

    /**
     * @api
     *
     * One source and its content, as it was stored: an ingested session's payload or a remembered fact. A source whose ingest is still queued answers 404 until it has been stored.
     *
     * @param string $sourceID Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $sourceID,
        string $namespace,
        string $profileID,
        RequestOptions|array|null $requestOptions = null,
    ): SourceGetResponse {
        $params = ['namespace' => $namespace, 'profileID' => $profileID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($sourceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Everything a profile has stored and extracts memories from: each ingested session, and each remembered fact, which has no session. Content is not listed; read one source for it. A source whose ingest is still queued is not here yet. Re-ingesting a session moves it to the front, so a listing paged while sessions are written can repeat or miss one at a page boundary. A `session_id` narrows the listing to the source that session was stored as: one source or none, and none -- an empty page, not a 404 -- for a session never ingested, still queued, or another profile's.
     *
     * @param string $profileID Path param
     * @param string $namespace Path param
     * @param int $pageNumber Query param: The page to return, counting from 1. Bounded in depth: (page[number] - 1) * page[size] may be at most 10000.
     * @param int $pageSize query param: How many results a page holds
     * @param string|Omitted|null $sessionID Query param: An ingested session, by the `session_id` it was ingested with. Narrows the request to the source that session was stored as.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<Source>
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        string $namespace,
        int $pageNumber = 1,
        int $pageSize = 20,
        string|Omitted|null $sessionID = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'namespace' => $namespace,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sessionID' => $sessionID,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes one source -- an ingested session or a remembered fact -- together with the memories derived from it. A memory derived from this source and others is deleted too, and derived again from what remains in the background. It answers only once the source is gone. A source that is not there -- never stored, another profile's, or already deleted -- answers 404, so on a `502` or a `504` repeat the identical request and read a 404 as done. An ingest of the same session that is still queued is not cancelled, and stores the session again when it runs. Nothing here can be undone.
     *
     * @param string $sourceID Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $sourceID,
        string $namespace,
        string $profileID,
        RequestOptions|array|null $requestOptions = null,
    ): SourceDeleteResponse {
        $params = ['namespace' => $namespace, 'profileID' => $profileID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($sourceID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
