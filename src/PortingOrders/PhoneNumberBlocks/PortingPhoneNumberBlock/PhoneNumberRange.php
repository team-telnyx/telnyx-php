<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Specifies the phone number range for this porting phone number block.
 *
 * @phpstan-type PhoneNumberRangeShape = array{
 *   endAt?: string|null, startAt?: string|null
 * }
 */
final class PhoneNumberRange implements BaseModel
{
    /** @use SdkModel<PhoneNumberRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the phone number range for this porting phone number block.
     */
    #[Optional('end_at')]
    public ?string $endAt;

    /**
     * Specifies the start of the phone number range for this porting phone number block.
     */
    #[Optional('start_at')]
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

        null !== $endAt && $obj['endAt'] = $endAt;
        null !== $startAt && $obj['startAt'] = $startAt;

        return $obj;
    }

    /**
     * Specifies the end of the phone number range for this porting phone number block.
     */
    public function withEndAt(string $endAt): self
    {
        $obj = clone $this;
        $obj['endAt'] = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the phone number range for this porting phone number block.
     */
    public function withStartAt(string $startAt): self
    {
        $obj = clone $this;
        $obj['startAt'] = $startAt;

        return $obj;
    }
}
