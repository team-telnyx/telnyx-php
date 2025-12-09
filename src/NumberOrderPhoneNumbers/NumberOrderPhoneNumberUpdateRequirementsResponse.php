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
 * @phpstan-type NumberOrderPhoneNumberUpdateRequirementsResponseShape = array{
 *   data?: NumberOrderPhoneNumber|null
 * }
 */
final class NumberOrderPhoneNumberUpdateRequirementsResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderPhoneNumberUpdateRequirementsResponseShape> */
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
