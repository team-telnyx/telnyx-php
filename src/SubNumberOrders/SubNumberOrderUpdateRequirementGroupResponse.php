<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\PhoneNumber;
use Telnyx\SubNumberOrders\SubNumberOrderUpdateRequirementGroupResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type SubNumberOrderUpdateRequirementGroupResponseShape = array{
 *   data?: Data|null
 * }
 */
final class SubNumberOrderUpdateRequirementGroupResponse implements BaseModel
{
    /** @use SdkModel<SubNumberOrderUpdateRequirementGroupResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   isBlockSubNumberOrder?: bool|null,
     *   orderRequestID?: string|null,
     *   phoneNumberType?: string|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   status?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   countryCode?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   isBlockSubNumberOrder?: bool|null,
     *   orderRequestID?: string|null,
     *   phoneNumberType?: string|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   phoneNumbersCount?: int|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   status?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
