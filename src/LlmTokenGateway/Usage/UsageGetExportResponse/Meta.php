<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetExportResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetaShape = array{
 *   hasMore: bool, horizonLagSeconds: int, nextCursor: string
 * }
 */
final class Meta implements BaseModel
{
    /** @use SdkModel<MetaShape> */
    use SdkModel;

    #[Required('has_more')]
    public bool $hasMore;

    #[Required('horizon_lag_seconds')]
    public int $horizonLagSeconds;

    #[Required('next_cursor')]
    public string $nextCursor;

    /**
     * `new Meta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Meta::with(hasMore: ..., horizonLagSeconds: ..., nextCursor: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Meta)->withHasMore(...)->withHorizonLagSeconds(...)->withNextCursor(...)
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
        bool $hasMore,
        int $horizonLagSeconds,
        string $nextCursor
    ): self {
        $self = new self;

        $self['hasMore'] = $hasMore;
        $self['horizonLagSeconds'] = $horizonLagSeconds;
        $self['nextCursor'] = $nextCursor;

        return $self;
    }

    public function withHasMore(bool $hasMore): self
    {
        $self = clone $this;
        $self['hasMore'] = $hasMore;

        return $self;
    }

    public function withHorizonLagSeconds(int $horizonLagSeconds): self
    {
        $self = clone $this;
        $self['horizonLagSeconds'] = $horizonLagSeconds;

        return $self;
    }

    public function withNextCursor(string $nextCursor): self
    {
        $self = clone $this;
        $self['nextCursor'] = $nextCursor;

        return $self;
    }
}
