<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse\Data;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumberUpdateRequirementGroupResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type NumberOrderPhoneNumberUpdateRequirementGroupResponseShape = array{
 *   data?: Data|null
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementGroupResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberUpdateRequirementGroupResponseShape> */
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
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   isBlockNumber?: bool|null,
     *   locality?: string|null,
     *   orderRequestID?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: string|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: string|null,
     *   status?: string|null,
     *   subNumberOrderID?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   isBlockNumber?: bool|null,
     *   locality?: string|null,
     *   orderRequestID?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: string|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: string|null,
     *   status?: string|null,
     *   subNumberOrderID?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
