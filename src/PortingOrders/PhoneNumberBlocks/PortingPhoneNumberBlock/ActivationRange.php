<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActivationRangeShape = array{
 *   end_at?: string|null, start_at?: string|null
 * }
 */
final class ActivationRange implements BaseModel
{
    /** @use SdkModel<ActivationRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the activation range. It must be no more than the end of the phone number range.
     */
    #[Optional]
    public ?string $end_at;

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the phone number range.
     */
    #[Optional]
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

        null !== $end_at && $obj['end_at'] = $end_at;
        null !== $start_at && $obj['start_at'] = $start_at;

        return $obj;
    }

    /**
     * Specifies the end of the activation range. It must be no more than the end of the phone number range.
     */
    public function withEndAt(string $endAt): self
    {
        $obj = clone $this;
        $obj['end_at'] = $endAt;

        return $obj;
    }

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the phone number range.
     */
    public function withStartAt(string $startAt): self
    {
        $obj = clone $this;
        $obj['start_at'] = $startAt;

        return $obj;
    }
}
