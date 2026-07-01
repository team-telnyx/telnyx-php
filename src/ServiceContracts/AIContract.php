<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AI\AIGetConversationHistoriesResponse;
use Telnyx\AI\AIRetrieveConversationHistoriesParams\Region;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\AI\ModelsResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AIContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string,mixed> $responseRequest
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function createResponseDeprecated(
        array $responseRequest,
        RequestOptions|array|null $requestOptions = null
    ): array;

    /**
     * @api
     *
     * @param string $q Natural language search query. The text is embedded into a 1024-dimensional vector and compared against indexed record chunks using semantic similarity.
     * @param \DateTimeInterface $filterIngestedAtGte only include records ingested (chunked, embedded, and indexed) on or after this ISO 8601 timestamp
     * @param \DateTimeInterface $filterIngestedAtLte only include records ingested (chunked, embedded, and indexed) on or before this ISO 8601 timestamp
     * @param \DateTimeInterface $filterRecordCreatedAtGte only include records whose original creation time is on or after this ISO 8601 timestamp
     * @param \DateTimeInterface $filterRecordCreatedAtLte only include records whose original creation time is on or before this ISO 8601 timestamp
     * @param string $filterRecordID filter to chunks belonging to a specific parent record (exact match)
     * @param string $filterRegionIn Filter by the region stored on the record. Comma-separated to match multiple regions (USA, DEU, AUS, UAE). Distinct from the `region` parameter, which selects which cluster(s) are queried.
     * @param string $filterRetention Filter by retention policy (exact match). Filter-only: not returned in the response body.
     * @param string $filterUserID filter to records owned by a specific user (exact match)
     * @param float $minScore Minimum cosine similarity score threshold (0.0 to 1.0). Results below this threshold are excluded.
     * @param int $pageNumber Page number to return (1-based). Defaults to 1.
     * @param int $pageSize Number of results per page. Defaults to 20, maximum 100.
     * @param Region|value-of<Region> $region Restrict search to a specific region. When omitted, all regions are queried in parallel (fan-out) and results are merged by similarity score.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveConversationHistories(
        string $q,
        ?\DateTimeInterface $filterIngestedAtGte = null,
        ?\DateTimeInterface $filterIngestedAtLte = null,
        ?\DateTimeInterface $filterRecordCreatedAtGte = null,
        ?\DateTimeInterface $filterRecordCreatedAtLte = null,
        ?string $filterRecordID = null,
        ?string $filterRegionIn = null,
        ?string $filterRetention = null,
        ?string $filterUserID = null,
        float $minScore = 0,
        int $pageNumber = 1,
        int $pageSize = 20,
        Region|string|null $region = null,
        RequestOptions|array|null $requestOptions = null,
    ): AIGetConversationHistoriesResponse;

    /**
     * @deprecated
     *
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveModels(
        RequestOptions|array|null $requestOptions = null
    ): ModelsResponse;

    /**
     * @api
     *
     * @param string $bucket the name of the bucket that contains the file to be summarized
     * @param string $filename the name of the file to be summarized
     * @param string $systemPrompt a system prompt to guide the summary generation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function summarize(
        string $bucket,
        string $filename,
        ?string $systemPrompt = null,
        RequestOptions|array|null $requestOptions = null,
    ): AISummarizeResponse;
}
