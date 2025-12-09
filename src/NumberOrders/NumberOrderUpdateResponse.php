<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers\Status;

/**
 * @phpstan-type NumberOrderUpdateResponseShape = array{
 *   data?: NumberOrderWithPhoneNumbers|null
 * }
 */
final class NumberOrderUpdateResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumberOrderWithPhoneNumbers $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberOrderWithPhoneNumbers|array{
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   requirementsMet?: bool|null,
     *   status?: value-of<Status>|null,
     *   subNumberOrdersIDs?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        NumberOrderWithPhoneNumbers|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberOrderWithPhoneNumbers|array{
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   requirementsMet?: bool|null,
     *   status?: value-of<Status>|null,
     *   subNumberOrdersIDs?: list<string>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NumberOrderWithPhoneNumbers|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
