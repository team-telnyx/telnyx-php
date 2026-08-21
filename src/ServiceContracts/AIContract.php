<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AI\AIGetConversationHistoriesResponse;
use Telnyx\AI\AIRetrieveConversationHistoriesParams\Region;
use Telnyx\AI\AISummarizeResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AIContract
{
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
     * @return DefaultFlatPagination<AIGetConversationHistoriesResponse>
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $bucket body param: The name of the bucket that contains the file to be summarized
     * @param string $filename body param: The name of the file to be summarized
     * @param string $systemPrompt body param: A system prompt to guide the summary generation
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function summarize(
        string $bucket,
        string $filename,
        ?string $systemPrompt = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): AISummarizeResponse;
}
