<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryGetResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryListResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MemoriesContract
{
    /**
     * @api
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
    ): MemoryGetResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;
}
