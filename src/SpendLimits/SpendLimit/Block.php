<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits\SpendLimit;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The active block of the period. `null` when the period is not blocked.
 *
 * @phpstan-type BlockShape = array{
 *   blockedUntil: string,
 *   detectedAt: \DateTimeInterface,
 *   limitUsd: string,
 *   spendUsd: string,
 * }
 */
final class Block implements BaseModel
{
    /** @use SdkModel<BlockShape> */
    use SdkModel;

    /**
     * Exclusive end of the block: it is lifted at 00:00 UTC on this date at the latest.
     */
    #[Required('blocked_until')]
    public string $blockedUntil;

    /**
     * When the block started.
     */
    #[Required('detected_at')]
    public \DateTimeInterface $detectedAt;

    /**
     * The limit in USD that the spend went above, as a decimal string.
     */
    #[Required('limit_usd')]
    public string $limitUsd;

    /**
     * Spend in USD when the block started, as a decimal string.
     */
    #[Required('spend_usd')]
    public string $spendUsd;

    /**
     * `new Block()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Block::with(blockedUntil: ..., detectedAt: ..., limitUsd: ..., spendUsd: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Block)
     *   ->withBlockedUntil(...)
     *   ->withDetectedAt(...)
     *   ->withLimitUsd(...)
     *   ->withSpendUsd(...)
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
        string $blockedUntil,
        \DateTimeInterface $detectedAt,
        string $limitUsd,
        string $spendUsd,
    ): self {
        $self = new self;

        $self['blockedUntil'] = $blockedUntil;
        $self['detectedAt'] = $detectedAt;
        $self['limitUsd'] = $limitUsd;
        $self['spendUsd'] = $spendUsd;

        return $self;
    }

    /**
     * Exclusive end of the block: it is lifted at 00:00 UTC on this date at the latest.
     */
    public function withBlockedUntil(string $blockedUntil): self
    {
        $self = clone $this;
        $self['blockedUntil'] = $blockedUntil;

        return $self;
    }

    /**
     * When the block started.
     */
    public function withDetectedAt(\DateTimeInterface $detectedAt): self
    {
        $self = clone $this;
        $self['detectedAt'] = $detectedAt;

        return $self;
    }

    /**
     * The limit in USD that the spend went above, as a decimal string.
     */
    public function withLimitUsd(string $limitUsd): self
    {
        $self = clone $this;
        $self['limitUsd'] = $limitUsd;

        return $self;
    }

    /**
     * Spend in USD when the block started, as a decimal string.
     */
    public function withSpendUsd(string $spendUsd): self
    {
        $self = clone $this;
        $self['spendUsd'] = $spendUsd;

        return $self;
    }
}
