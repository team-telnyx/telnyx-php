<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrdersActivationJob;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActivationWindowShape = array{
 *   endAt?: \DateTimeInterface|null, startAt?: \DateTimeInterface|null
 * }
 */
final class ActivationWindow implements BaseModel
{
    /** @use SdkModel<ActivationWindowShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating when the activation window ends.
     */
    #[Optional('end_at')]
    public ?\DateTimeInterface $endAt;

    /**
     * ISO 8601 formatted date indicating when the activation window starts.
     */
    #[Optional('start_at')]
    public ?\DateTimeInterface $startAt;

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
        ?\DateTimeInterface $endAt = null,
        ?\DateTimeInterface $startAt = null
    ): self {
        $self = new self;

        null !== $endAt && $self['endAt'] = $endAt;
        null !== $startAt && $self['startAt'] = $startAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the activation window ends.
     */
    public function withEndAt(\DateTimeInterface $endAt): self
    {
        $self = clone $this;
        $self['endAt'] = $endAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the activation window starts.
     */
    public function withStartAt(\DateTimeInterface $startAt): self
    {
        $self = clone $this;
        $self['startAt'] = $startAt;

        return $self;
    }
}
