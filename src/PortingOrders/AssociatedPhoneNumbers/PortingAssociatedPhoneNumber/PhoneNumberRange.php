<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Specifies the phone number range for this associated phone number.
 *
 * @phpstan-type PhoneNumberRangeShape = array{
 *   end_at?: string|null, start_at?: string|null
 * }
 */
final class PhoneNumberRange implements BaseModel
{
    /** @use SdkModel<PhoneNumberRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the phone number range for this associated phone number.
     */
    #[Api(optional: true)]
    public ?string $end_at;

    /**
     * Specifies the start of the phone number range for this associated phone number.
     */
    #[Api(optional: true)]
    public ?string $start_at;

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
        ?string $end_at = null,
        ?string $start_at = null
    ): self {
        $obj = new self;

        null !== $end_at && $obj->end_at = $end_at;
        null !== $start_at && $obj->start_at = $start_at;

        return $obj;
    }

    /**
     * Specifies the end of the phone number range for this associated phone number.
     */
    public function withEndAt(string $endAt): self
    {
        $obj = clone $this;
        $obj->end_at = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the phone number range for this associated phone number.
     */
    public function withStartAt(string $startAt): self
    {
        $obj = clone $this;
        $obj->start_at = $startAt;

        return $obj;
    }
}
