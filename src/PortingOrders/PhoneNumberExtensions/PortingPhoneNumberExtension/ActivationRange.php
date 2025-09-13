<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type activation_range = array{endAt?: int, startAt?: int}
 */
final class ActivationRange implements BaseModel
{
    /** @use SdkModel<activation_range> */
    use SdkModel;

    /**
     * Specifies the end of the activation range. It must be no more than the end of the extension range.
     */
    #[Api('end_at', optional: true)]
    public ?int $endAt;

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the extension range.
     */
    #[Api('start_at', optional: true)]
    public ?int $startAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $endAt = null, ?int $startAt = null): self
    {
        $obj = new self;

        null !== $endAt && $obj->endAt = $endAt;
        null !== $startAt && $obj->startAt = $startAt;

        return $obj;
    }

    /**
     * Specifies the end of the activation range. It must be no more than the end of the extension range.
     */
    public function withEndAt(int $endAt): self
    {
        $obj = clone $this;
        $obj->endAt = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the extension range.
     */
    public function withStartAt(int $startAt): self
    {
        $obj = clone $this;
        $obj->startAt = $startAt;

        return $obj;
    }
}
