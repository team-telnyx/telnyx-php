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

    #[Required('cache_hits')]
    public int $cacheHits;

    #[Required('failed_requests')]
    public int $failedRequests;

    #[Required('input_tokens')]
    public int $inputTokens;

    #[Required]
    public string $model;

    #[Required('output_tokens')]
    public int $outputTokens;

    #[Required('partial_requests')]
    public int $partialRequests;

    #[Required]
    public int $requests;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required('reserved_spend')]
    public float $reservedSpend;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required]
    public float $spend;

    #[Required('succeeded_requests')]
    public int $succeededRequests;

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

    public function withCacheHits(int $cacheHits): self
    {
        $self = clone $this;
        $self['cacheHits'] = $cacheHits;

        return $self;
    }

    public function withFailedRequests(int $failedRequests): self
    {
        $self = clone $this;
        $self['failedRequests'] = $failedRequests;

        return $self;
    }

    public function withInputTokens(int $inputTokens): self
    {
        $self = clone $this;
        $self['inputTokens'] = $inputTokens;

        return $self;
    }

    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    public function withOutputTokens(int $outputTokens): self
    {
        $self = clone $this;
        $self['outputTokens'] = $outputTokens;

        return $self;
    }

    public function withPartialRequests(int $partialRequests): self
    {
        $self = clone $this;
        $self['partialRequests'] = $partialRequests;

        return $self;
    }

    public function withRequests(int $requests): self
    {
        $self = clone $this;
        $self['requests'] = $requests;

        return $self;
    }

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    public function withReservedSpend(float $reservedSpend): self
    {
        $self = clone $this;
        $self['reservedSpend'] = $reservedSpend;

        return $self;
    }

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    public function withSpend(float $spend): self
    {
        $self = clone $this;
        $self['spend'] = $spend;

        return $self;
    }

    public function withSucceededRequests(int $succeededRequests): self
    {
        $self = clone $this;
        $self['succeededRequests'] = $succeededRequests;

        return $self;
    }

    public function withUnknownRequests(int $unknownRequests): self
    {
        $self = clone $this;
        $self['unknownRequests'] = $unknownRequests;

        return $self;
    }
}
