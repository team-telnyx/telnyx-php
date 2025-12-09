<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers\Status;

/**
 * @phpstan-type NumberOrderNewResponseShape = array{
 *   data?: NumberOrderWithPhoneNumbers|null
 * }
 */
final class NumberOrderNewResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderNewResponseShape> */
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
