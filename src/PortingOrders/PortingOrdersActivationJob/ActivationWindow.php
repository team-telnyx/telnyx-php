<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrdersActivationJob;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type activation_window = array{
 *   endAt?: \DateTimeInterface, startAt?: \DateTimeInterface
 * }
 */
final class ActivationWindow implements BaseModel
{
    /** @use SdkModel<activation_window> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating when the activation window ends.
     */
    #[Api('end_at', optional: true)]
    public ?\DateTimeInterface $endAt;

    /**
     * ISO 8601 formatted date indicating when the activation window starts.
     */
    #[Api('start_at', optional: true)]
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
        $obj = new self;

        null !== $endAt && $obj->endAt = $endAt;
        null !== $startAt && $obj->startAt = $startAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the activation window ends.
     */
    public function withEndAt(\DateTimeInterface $endAt): self
    {
        $obj = clone $this;
        $obj->endAt = $endAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the activation window starts.
     */
    public function withStartAt(\DateTimeInterface $startAt): self
    {
        $obj = clone $this;
        $obj->startAt = $startAt;

        return $obj;
    }
}
