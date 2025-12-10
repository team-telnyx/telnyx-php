<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\SourceType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\Status;

/**
 * @phpstan-type PhoneNumberUpdateResponseShape = array{
 *   data?: PhoneNumberDetailed|null
 * }
 */
final class PhoneNumberUpdateResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PhoneNumberDetailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PhoneNumberDetailed|array{
     *   id: string,
     *   countryISOAlpha2: string,
     *   createdAt: \DateTimeInterface,
     *   deletionLockEnabled: bool,
     *   externalPin: string|null,
     *   phoneNumber: string,
     *   phoneNumberType: value-of<PhoneNumberType>,
     *   purchasedAt: string,
     *   recordType: string,
     *   status: value-of<Status>,
     *   tags: list<string>,
     *   billingGroupID?: string|null,
     *   callForwardingEnabled?: bool|null,
     *   callRecordingEnabled?: bool|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListingEnabled?: bool|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   customerReference?: string|null,
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   emergencyStatus?: value-of<EmergencyStatus>|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   messagingProfileID?: string|null,
     *   messagingProfileName?: string|null,
     *   sourceType?: value-of<SourceType>|null,
     *   t38FaxGatewayEnabled?: bool|null,
     * } $data
     */
    public static function with(PhoneNumberDetailed|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PhoneNumberDetailed|array{
     *   id: string,
     *   countryISOAlpha2: string,
     *   createdAt: \DateTimeInterface,
     *   deletionLockEnabled: bool,
     *   externalPin: string|null,
     *   phoneNumber: string,
     *   phoneNumberType: value-of<PhoneNumberType>,
     *   purchasedAt: string,
     *   recordType: string,
     *   status: value-of<Status>,
     *   tags: list<string>,
     *   billingGroupID?: string|null,
     *   callForwardingEnabled?: bool|null,
     *   callRecordingEnabled?: bool|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListingEnabled?: bool|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   customerReference?: string|null,
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   emergencyStatus?: value-of<EmergencyStatus>|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   messagingProfileID?: string|null,
     *   messagingProfileName?: string|null,
     *   sourceType?: value-of<SourceType>|null,
     *   t38FaxGatewayEnabled?: bool|null,
     * } $data
     */
    public function withData(PhoneNumberDetailed|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
