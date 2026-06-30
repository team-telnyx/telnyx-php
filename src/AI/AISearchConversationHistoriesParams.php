<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\AI\AISearchConversationHistoriesParams\Region;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Performs semantic vector search across conversation history records.
 *
 * **How it works:**
 * 1. The query text is embedded into a 1024-dimensional vector using the multilingual-e5-large model.
 * 2. The vector is compared against indexed record chunks using semantic similarity search.
 * 3. When no region is specified, all regions are queried in parallel (fan-out) and results are merged by score.
 * 4. Results are ranked by similarity score (descending) and paginated via `page[number]` / `page[size]`.
 *
 * **Authentication:** Requires a Telnyx API key via `Authorization: Bearer <key>`. Results are automatically scoped to the caller's organization — `organization_id` is injected from the auth token and cannot be overridden.
 *
 * **Chunking:** Records are split into chunks of up to 480 tokens with 64-token overlap at ingestion time. Each search result represents a single chunk, with `chunk_index` and `chunk_total` indicating its position within the original record.
 *
 * **Filtering:** Use `filter[field][operator]=value` query parameters to narrow results before vector search.
 *
 * Top-level filterable fields: `user_id`, `region`, `record_id`, `record_created_at`, `ingested_at`, `retention`
 *
 * Note: `retention` is filter-only — it can be used to narrow results but is not returned in the response body.
 *
 * Metadata fields: any field not in the list above is resolved to `data.metadata.<field>` (e.g., `filter[language]=en` → `data.metadata.language`).
 *
 * Supported filter operators:
 * - `eq` — exact match (default when no operator specified)
 * - `in` — match any of comma-separated values
 * - `gte`, `gt`, `lte`, `lt` — range comparisons (useful for date filtering)
 * - `contains` — wildcard substring match
 *
 * **Examples:**
 * ```
 * GET /v2/ai/conversation_histories?q=billing+issue&page[size]=10
 * GET /v2/ai/conversation_histories?q=setup+guide&region=USA&min_score=0.5
 * GET /v2/ai/conversation_histories?q=refund&filter[record_created_at][gte]=2026-01-01T00:00:00Z
 * GET /v2/ai/conversation_histories?q=outage&filter[region][in]=USA,DEU
 * GET /v2/ai/conversation_histories?q=hold+time&filter[language]=en
 * ```
 *
 * @see Telnyx\Services\AIService::searchConversationHistories()
 *
 * @phpstan-type AISearchConversationHistoriesParamsShape = array{
 *   q: string,
 *   filterIngestedAtGte?: \DateTimeInterface|null,
 *   filterIngestedAtLte?: \DateTimeInterface|null,
 *   filterRecordCreatedAtGte?: \DateTimeInterface|null,
 *   filterRecordCreatedAtLte?: \DateTimeInterface|null,
 *   filterRecordID?: string|null,
 *   filterRegionIn?: string|null,
 *   filterRetention?: string|null,
 *   filterUserID?: string|null,
 *   minScore?: float|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 *   region?: null|Region|value-of<Region>,
 * }
 */
final class AISearchConversationHistoriesParams implements BaseModel
{
    /** @use SdkModel<AISearchConversationHistoriesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Natural language search query. The text is embedded into a 1024-dimensional vector and compared against indexed record chunks using semantic similarity.
     */
    #[Required]
    public string $q;

    /**
     * Only include records ingested (chunked, embedded, and indexed) on or after this ISO 8601 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterIngestedAtGte;

    /**
     * Only include records ingested (chunked, embedded, and indexed) on or before this ISO 8601 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterIngestedAtLte;

    /**
     * Only include records whose original creation time is on or after this ISO 8601 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterRecordCreatedAtGte;

    /**
     * Only include records whose original creation time is on or before this ISO 8601 timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterRecordCreatedAtLte;

    /**
     * Filter to chunks belonging to a specific parent record (exact match).
     */
    #[Optional]
    public ?string $filterRecordID;

    /**
     * Filter by the region stored on the record. Comma-separated to match multiple regions (USA, DEU, AUS, UAE). Distinct from the `region` parameter, which selects which cluster(s) are queried.
     */
    #[Optional]
    public ?string $filterRegionIn;

    /**
     * Filter by retention policy (exact match). Filter-only: not returned in the response body.
     */
    #[Optional]
    public ?string $filterRetention;

    /**
     * Filter to records owned by a specific user (exact match).
     */
    #[Optional]
    public ?string $filterUserID;

    /**
     * Minimum cosine similarity score threshold (0.0 to 1.0). Results below this threshold are excluded.
     */
    #[Optional]
    public ?float $minScore;

    /**
     * Page number to return (1-based). Defaults to 1.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of results per page. Defaults to 20, maximum 100.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Restrict search to a specific region. When omitted, all regions are queried in parallel (fan-out) and results are merged by similarity score.
     *
     * @var value-of<Region>|null $region
     */
    #[Optional(enum: Region::class)]
    public ?string $region;

    /**
     * `new AISearchConversationHistoriesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AISearchConversationHistoriesParams::with(q: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AISearchConversationHistoriesParams)->withQ(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Region|value-of<Region>|null $region
     */
    public static function with(
        string $q,
        ?\DateTimeInterface $filterIngestedAtGte = null,
        ?\DateTimeInterface $filterIngestedAtLte = null,
        ?\DateTimeInterface $filterRecordCreatedAtGte = null,
        ?\DateTimeInterface $filterRecordCreatedAtLte = null,
        ?string $filterRecordID = null,
        ?string $filterRegionIn = null,
        ?string $filterRetention = null,
        ?string $filterUserID = null,
        ?float $minScore = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Region|string|null $region = null,
    ): self {
        $self = new self;

        $self['q'] = $q;

        null !== $filterIngestedAtGte && $self['filterIngestedAtGte'] = $filterIngestedAtGte;
        null !== $filterIngestedAtLte && $self['filterIngestedAtLte'] = $filterIngestedAtLte;
        null !== $filterRecordCreatedAtGte && $self['filterRecordCreatedAtGte'] = $filterRecordCreatedAtGte;
        null !== $filterRecordCreatedAtLte && $self['filterRecordCreatedAtLte'] = $filterRecordCreatedAtLte;
        null !== $filterRecordID && $self['filterRecordID'] = $filterRecordID;
        null !== $filterRegionIn && $self['filterRegionIn'] = $filterRegionIn;
        null !== $filterRetention && $self['filterRetention'] = $filterRetention;
        null !== $filterUserID && $self['filterUserID'] = $filterUserID;
        null !== $minScore && $self['minScore'] = $minScore;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $region && $self['region'] = $region;

        return $self;
    }

    /**
     * Natural language search query. The text is embedded into a 1024-dimensional vector and compared against indexed record chunks using semantic similarity.
     */
    public function withQ(string $q): self
    {
        $self = clone $this;
        $self['q'] = $q;

        return $self;
    }

    /**
     * Only include records ingested (chunked, embedded, and indexed) on or after this ISO 8601 timestamp.
     */
    public function withFilterIngestedAtGte(
        \DateTimeInterface $filterIngestedAtGte
    ): self {
        $self = clone $this;
        $self['filterIngestedAtGte'] = $filterIngestedAtGte;

        return $self;
    }

    /**
     * Only include records ingested (chunked, embedded, and indexed) on or before this ISO 8601 timestamp.
     */
    public function withFilterIngestedAtLte(
        \DateTimeInterface $filterIngestedAtLte
    ): self {
        $self = clone $this;
        $self['filterIngestedAtLte'] = $filterIngestedAtLte;

        return $self;
    }

    /**
     * Only include records whose original creation time is on or after this ISO 8601 timestamp.
     */
    public function withFilterRecordCreatedAtGte(
        \DateTimeInterface $filterRecordCreatedAtGte
    ): self {
        $self = clone $this;
        $self['filterRecordCreatedAtGte'] = $filterRecordCreatedAtGte;

        return $self;
    }

    /**
     * Only include records whose original creation time is on or before this ISO 8601 timestamp.
     */
    public function withFilterRecordCreatedAtLte(
        \DateTimeInterface $filterRecordCreatedAtLte
    ): self {
        $self = clone $this;
        $self['filterRecordCreatedAtLte'] = $filterRecordCreatedAtLte;

        return $self;
    }

    /**
     * Filter to chunks belonging to a specific parent record (exact match).
     */
    public function withFilterRecordID(string $filterRecordID): self
    {
        $self = clone $this;
        $self['filterRecordID'] = $filterRecordID;

        return $self;
    }

    /**
     * Filter by the region stored on the record. Comma-separated to match multiple regions (USA, DEU, AUS, UAE). Distinct from the `region` parameter, which selects which cluster(s) are queried.
     */
    public function withFilterRegionIn(string $filterRegionIn): self
    {
        $self = clone $this;
        $self['filterRegionIn'] = $filterRegionIn;

        return $self;
    }

    /**
     * Filter by retention policy (exact match). Filter-only: not returned in the response body.
     */
    public function withFilterRetention(string $filterRetention): self
    {
        $self = clone $this;
        $self['filterRetention'] = $filterRetention;

        return $self;
    }

    /**
     * Filter to records owned by a specific user (exact match).
     */
    public function withFilterUserID(string $filterUserID): self
    {
        $self = clone $this;
        $self['filterUserID'] = $filterUserID;

        return $self;
    }

    /**
     * Minimum cosine similarity score threshold (0.0 to 1.0). Results below this threshold are excluded.
     */
    public function withMinScore(float $minScore): self
    {
        $self = clone $this;
        $self['minScore'] = $minScore;

        return $self;
    }

    /**
     * Page number to return (1-based). Defaults to 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of results per page. Defaults to 20, maximum 100.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Restrict search to a specific region. When omitted, all regions are queried in parallel (fan-out) and results are merged by similarity score.
     *
     * @param Region|value-of<Region> $region
     */
    public function withRegion(Region|string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }
}
