<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\PhoneNumberRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\PhoneNumberType;

/**
 * @phpstan-type PhoneNumberBlockDeleteResponseShape = array{
 *   data?: PortingPhoneNumberBlock|null
 * }
 */
final class PhoneNumberBlockDeleteResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberBlockDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingPhoneNumberBlock $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingPhoneNumberBlock|array{
     *   id?: string|null,
     *   activation_ranges?: list<ActivationRange>|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   phone_number_range?: PhoneNumberRange|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PortingPhoneNumberBlock|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortingPhoneNumberBlock|array{
     *   id?: string|null,
     *   activation_ranges?: list<ActivationRange>|null,
     *   country_code?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   phone_number_range?: PhoneNumberRange|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingPhoneNumberBlock|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
