<?php

declare(strict_types=1);

namespace Telnyx\DialMetrics\DialMetricListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DialMetrics\DialMetricListResponse\Dials\Rejected;

/**
 * Dial attempt counts in the bucket.
 *
 * @phpstan-import-type RejectedShape from \Telnyx\DialMetrics\DialMetricListResponse\Dials\Rejected
 *
 * @phpstan-type DialsShape = array{
 *   accepted?: int|null, rejected?: null|Rejected|RejectedShape, total?: int|null
 * }
 */
final class Dials implements BaseModel
{
    /** @use SdkModel<DialsShape> */
    use SdkModel;

    /**
     * Dial attempts that were not rejected by a limit.
     */
    #[Optional]
    public ?int $accepted;

    /**
     * Dial attempts rejected by a limit.
     */
    #[Optional]
    public ?Rejected $rejected;

    /**
     * All dial attempts, rejected ones included: accepted plus every rejected count.
     */
    #[Optional]
    public ?int $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Rejected|RejectedShape|null $rejected
     */
    public static function with(
        ?int $accepted = null,
        Rejected|array|null $rejected = null,
        ?int $total = null
    ): self {
        $self = new self;

        null !== $accepted && $self['accepted'] = $accepted;
        null !== $rejected && $self['rejected'] = $rejected;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * Dial attempts that were not rejected by a limit.
     */
    public function withAccepted(int $accepted): self
    {
        $self = clone $this;
        $self['accepted'] = $accepted;

        return $self;
    }

    /**
     * Dial attempts rejected by a limit.
     *
     * @param Rejected|RejectedShape $rejected
     */
    public function withRejected(Rejected|array $rejected): self
    {
        $self = clone $this;
        $self['rejected'] = $rejected;

        return $self;
    }

    /**
     * All dial attempts, rejected ones included: accepted plus every rejected count.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
