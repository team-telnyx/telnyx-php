<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryGetResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Memory\Namespaces\Profiles\MemoriesContract;

/**
 * What a namespace and a profile hold.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MemoriesService implements MemoriesContract
{
    /**
     * @api
     */
    public MemoriesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MemoriesRawService($client);
    }

    /**
     * @api
     *
     * One memory by its id, as `recall` and the listing return it, together with what it came from. A fact names its `source_id`: read it with `GET .../sources/{source_id}` to see what was stored. A memory derived from other memories names them in `derived_from` instead; read each of those to reach its source.
     *
     * @param string $memoryID a memory's id, as `recall` and the listing return it
     * @param string $namespace The namespace. `default` exists for every organization.
     * @param string $profileID the profile: your identifier for the user, caller or agent this memory is about
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $memoryID,
        string $namespace,
        string $profileID,
        RequestOptions|array|null $requestOptions = null,
    ): MemoryGetResponse {
        $params = ['namespace' => $namespace, 'profileID' => $profileID];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($memoryID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Everything stored under one profile, unranked -- ask `recall` for the memories that answer a question. A profile that holds nothing is an empty page rather than a 404: profiles exist by being written to. Each memory names the `source_id` it was extracted from, or null for a memory derived from other memories -- which can read almost the same as the fact it restates. A `source_id` narrows the listing to the memories extracted from that source, and a `session_id` to those extracted from the session, which is the same thing named another way; pass one or the other. Neither is everything the source led to: a memory derived from several sources belongs to no single one and appears only in the unfiltered listing. A memory written while the listing is paged shifts the pages after it, so an entry can be repeated or missed at a page boundary.
     *
     * @param string $profileID Path param
     * @param string $namespace Path param
     * @param int $pageNumber Query param: The page to return, counting from 1. Bounded in depth: (page[number] - 1) * page[size] may be at most 10000.
     * @param int $pageSize query param: How many results a page holds
     * @param string|Omitted|null $sessionID Query param: An ingested session, by the `session_id` it was ingested with. Narrows the request to the source that session was stored as.
     * @param string|Omitted|null $sourceID Query param: Narrows the listing to the memories extracted from one source, a remembered fact as well as a session. Pass this or `session_id`, not both.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MemoryListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        string $namespace,
        int $pageNumber = 1,
        int $pageSize = 20,
        string|Omitted|null $sessionID = Omitted::VALUE,
        string|Omitted|null $sourceID = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'namespace' => $namespace,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sessionID' => $sessionID,
                'sourceID' => $sourceID,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
