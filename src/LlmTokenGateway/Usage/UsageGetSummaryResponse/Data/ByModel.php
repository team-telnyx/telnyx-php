<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ByModelShape = array{
 *   cacheHits: int,
 *   failedRequests: int,
 *   inputTokens: int,
 *   model: string,
 *   outputTokens: int,
 *   partialRequests: int,
 *   requests: int,
 *   reservedSpend: float,
 *   spend: float,
 *   succeededRequests: int,
 *   unknownRequests: int,
 * }
 */
final class ByModel implements BaseModel
{
    /** @use SdkModel<ByModelShape> */
    use SdkModel;

    /**
     * Requests served from the gateway cache.
     */
    #[Required('cache_hits')]
    public int $cacheHits;

    /**
     * Requests classified as failed.
     */
    #[Required('failed_requests')]
    public int $failedRequests;

    /**
     * Independently known input tokens across attempts, including corrected usage.
     */
    #[Required('input_tokens')]
    public int $inputTokens;

    /**
     * Model identifier.
     */
    #[Required]
    public string $model;

    /**
     * Independently known output tokens across attempts, including corrected usage.
     */
    #[Required('output_tokens')]
    public int $outputTokens;

    /**
     * Requests classified as partial after streaming began.
     */
    #[Required('partial_requests')]
    public int $partialRequests;

    /**
     * Number of matching requests.
     */
    #[Required]
    public int $requests;

    /**
     * Unresolved budget reservations in USD.
     */
    #[Required('reserved_spend')]
    public float $reservedSpend;

    /**
     * Sum of known reference/enforcement cost in USD.
     */
    #[Required]
    public float $spend;

    /**
     * Requests classified as succeeded.
     */
    #[Required('succeeded_requests')]
    public int $succeededRequests;

    /**
     * Requests whose cost remains unresolved; unknown cost is excluded from spend.
     */
    #[Required('unknown_requests')]
    public int $unknownRequests;

    /**
     * `new ByModel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ByModel::with(
     *   cacheHits: ...,
     *   failedRequests: ...,
     *   inputTokens: ...,
     *   model: ...,
     *   outputTokens: ...,
     *   partialRequests: ...,
     *   requests: ...,
     *   reservedSpend: ...,
     *   spend: ...,
     *   succeededRequests: ...,
     *   unknownRequests: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ByModel)
     *   ->withCacheHits(...)
     *   ->withFailedRequests(...)
     *   ->withInputTokens(...)
     *   ->withModel(...)
     *   ->withOutputTokens(...)
     *   ->withPartialRequests(...)
     *   ->withRequests(...)
     *   ->withReservedSpend(...)
     *   ->withSpend(...)
     *   ->withSucceededRequests(...)
     *   ->withUnknownRequests(...)
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
     */
    public static function with(
        int $cacheHits,
        int $failedRequests,
        int $inputTokens,
        string $model,
        int $outputTokens,
        int $partialRequests,
        int $requests,
        float $reservedSpend,
        float $spend,
        int $succeededRequests,
        int $unknownRequests,
    ): self {
        $self = new self;

        $self['cacheHits'] = $cacheHits;
        $self['failedRequests'] = $failedRequests;
        $self['inputTokens'] = $inputTokens;
        $self['model'] = $model;
        $self['outputTokens'] = $outputTokens;
        $self['partialRequests'] = $partialRequests;
        $self['requests'] = $requests;
        $self['reservedSpend'] = $reservedSpend;
        $self['spend'] = $spend;
        $self['succeededRequests'] = $succeededRequests;
        $self['unknownRequests'] = $unknownRequests;

        return $self;
    }

    /**
     * Requests served from the gateway cache.
     */
    public function withCacheHits(int $cacheHits): self
    {
        $self = clone $this;
        $self['cacheHits'] = $cacheHits;

        return $self;
    }

    /**
     * Requests classified as failed.
     */
    public function withFailedRequests(int $failedRequests): self
    {
        $self = clone $this;
        $self['failedRequests'] = $failedRequests;

        return $self;
    }

    /**
     * Independently known input tokens across attempts, including corrected usage.
     */
    public function withInputTokens(int $inputTokens): self
    {
        $self = clone $this;
        $self['inputTokens'] = $inputTokens;

        return $self;
    }

    /**
     * Model identifier.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Independently known output tokens across attempts, including corrected usage.
     */
    public function withOutputTokens(int $outputTokens): self
    {
        $self = clone $this;
        $self['outputTokens'] = $outputTokens;

        return $self;
    }

    /**
     * Requests classified as partial after streaming began.
     */
    public function withPartialRequests(int $partialRequests): self
    {
        $self = clone $this;
        $self['partialRequests'] = $partialRequests;

        return $self;
    }

    /**
     * Number of matching requests.
     */
    public function withRequests(int $requests): self
    {
        $self = clone $this;
        $self['requests'] = $requests;

        return $self;
    }

    /**
     * Unresolved budget reservations in USD.
     */
    public function withReservedSpend(float $reservedSpend): self
    {
        $self = clone $this;
        $self['reservedSpend'] = $reservedSpend;

        return $self;
    }

    /**
     * Sum of known reference/enforcement cost in USD.
     */
    public function withSpend(float $spend): self
    {
        $self = clone $this;
        $self['spend'] = $spend;

        return $self;
    }

    /**
     * Requests classified as succeeded.
     */
    public function withSucceededRequests(int $succeededRequests): self
    {
        $self = clone $this;
        $self['succeededRequests'] = $succeededRequests;

        return $self;
    }

    /**
     * Requests whose cost remains unresolved; unknown cost is excluded from spend.
     */
    public function withUnknownRequests(int $unknownRequests): self
    {
        $self = clone $this;
        $self['unknownRequests'] = $unknownRequests;

        return $self;
    }
}
