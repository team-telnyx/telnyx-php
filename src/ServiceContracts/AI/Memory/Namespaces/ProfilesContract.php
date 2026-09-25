<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory\Namespaces;

use Telnyx\AI\Memory\Namespaces\Profiles\ProfileDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileGetSummaryResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileListResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRecallResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRememberResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type BodyShape from \Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestParams\Body
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ProfilesContract
{
    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
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
    ): ProfileDeleteResponse;

    /**
     * @api
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
    ): ProfileIngestResponse;

    /**
     * @api
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
    ): ProfileRecallResponse;

    /**
     * @api
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
    ): ProfileRememberResponse;

    /**
     * @api
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
    ): ProfileGetSummaryResponse;
}
