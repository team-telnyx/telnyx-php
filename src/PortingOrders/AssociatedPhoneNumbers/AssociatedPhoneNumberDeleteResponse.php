<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberType;

/**
 * @phpstan-type AssociatedPhoneNumberDeleteResponseShape = array{
 *   data?: PortingAssociatedPhoneNumber|null
 * }
 */
final class AssociatedPhoneNumberDeleteResponse implements BaseModel
{
    /** @use SdkModel<AssociatedPhoneNumberDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingAssociatedPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingAssociatedPhoneNumber|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   phoneNumberRange?: PhoneNumberRange|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PortingAssociatedPhoneNumber|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingAssociatedPhoneNumber|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   phoneNumberRange?: PhoneNumberRange|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   portingOrderID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingAssociatedPhoneNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
