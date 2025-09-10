<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers\AssociatedPhoneNumberCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type phone_number_range = array{
 *   endAt?: string|null, startAt?: string|null
 * }
 */
final class PhoneNumberRange implements BaseModel
{
    /** @use SdkModel<phone_number_range> */
    use SdkModel;

    /**
     * Specifies the end of the phone number range for this associated phone number.
     */
    #[Api('end_at', optional: true)]
    public ?string $endAt;

    /**
     * Specifies the start of the phone number range for this associated phone number.
     */
    #[Api('start_at', optional: true)]
    public ?string $startAt;

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
        ?string $endAt = null,
        ?string $startAt = null
    ): self {
        $obj = new self;

        null !== $endAt && $obj->endAt = $endAt;
        null !== $startAt && $obj->startAt = $startAt;

        return $obj;
    }

    /**
     * Specifies the end of the phone number range for this associated phone number.
     */
    public function withEndAt(string $endAt): self
    {
        $obj = clone $this;
        $obj->endAt = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the phone number range for this associated phone number.
     */
    public function withStartAt(string $startAt): self
    {
        $obj = clone $this;
        $obj->startAt = $startAt;

        return $obj;
    }
}
