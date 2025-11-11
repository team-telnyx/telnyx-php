<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrdersActivationJob;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActivationWindowShape = array{
 *   end_at?: \DateTimeInterface|null, start_at?: \DateTimeInterface|null
 * }
 */
final class ActivationWindow implements BaseModel
{
    /** @use SdkModel<ActivationWindowShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating when the activation window ends.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $end_at;

    /**
     * ISO 8601 formatted date indicating when the activation window starts.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $start_at;

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
        ?\DateTimeInterface $end_at = null,
        ?\DateTimeInterface $start_at = null
    ): self {
        $obj = new self;

        null !== $end_at && $obj->end_at = $end_at;
        null !== $start_at && $obj->start_at = $start_at;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the activation window ends.
     */
    public function withEndAt(\DateTimeInterface $endAt): self
    {
        $obj = clone $this;
        $obj->end_at = $endAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the activation window starts.
     */
    public function withStartAt(\DateTimeInterface $startAt): self
    {
        $obj = clone $this;
        $obj->start_at = $startAt;

        return $obj;
    }
}
