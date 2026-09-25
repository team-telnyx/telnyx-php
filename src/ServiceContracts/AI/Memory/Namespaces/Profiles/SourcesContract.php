<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Collections\Sources\Source;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SourcesContract
{
    /**
     * @api
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
    ): SourceGetResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
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
    ): SourceDeleteResponse;
}
