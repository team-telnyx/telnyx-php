<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrder\PhoneNumberType;
use Telnyx\SubNumberOrders\SubNumberOrder\Status;

/**
 * @phpstan-type SubNumberOrderGetResponseShape = array{data?: SubNumberOrder|null}
 */
final class SubNumberOrderGetResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SubNumberOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SubNumberOrder|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   isBlockSubNumberOrder?: bool|null,
     *   orderRequestID?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     * } $data
     */
    public static function with(SubNumberOrder|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param SubNumberOrder|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   isBlockSubNumberOrder?: bool|null,
     *   orderRequestID?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     * } $data
     */
    public function withData(SubNumberOrder|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
