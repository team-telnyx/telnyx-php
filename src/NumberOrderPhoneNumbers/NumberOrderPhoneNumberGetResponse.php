<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\PhoneNumberType;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\RequirementsStatus;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\Status;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;

/**
 * @phpstan-type NumberOrderPhoneNumberGetResponseShape = array{
 *   data?: NumberOrderPhoneNumber|null
 * }
 */
final class NumberOrderPhoneNumberGetResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumberOrderPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberOrderPhoneNumber|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   isBlockNumber?: bool|null,
     *   locality?: string|null,
     *   orderRequestID?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: value-of<RequirementsStatus>|null,
     *   status?: value-of<Status>|null,
     *   subNumberOrderID?: string|null,
     * } $data
     */
    public static function with(NumberOrderPhoneNumber|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberOrderPhoneNumber|array{
     *   id?: string|null,
     *   bundleID?: string|null,
     *   countryCode?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   isBlockNumber?: bool|null,
     *   locality?: string|null,
     *   orderRequestID?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   recordType?: string|null,
     *   regulatoryRequirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirementsMet?: bool|null,
     *   requirementsStatus?: value-of<RequirementsStatus>|null,
     *   status?: value-of<Status>|null,
     *   subNumberOrderID?: string|null,
     * } $data
     */
    public function withData(NumberOrderPhoneNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
