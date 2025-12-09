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
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   callForwardingEnabled?: bool|null,
     *   callRecordingEnabled?: bool|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListingEnabled?: bool|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   countryISOAlpha2?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   deletionLockEnabled?: bool|null,
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   emergencyStatus?: value-of<EmergencyStatus>|null,
     *   externalPin?: string|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   messagingProfileID?: string|null,
     *   messagingProfileName?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   purchasedAt?: string|null,
     *   recordType?: string|null,
     *   sourceType?: value-of<SourceType>|null,
     *   status?: value-of<Status>|null,
     *   t38FaxGatewayEnabled?: bool|null,
     *   tags?: list<string>|null,
     * } $data
     */
    public static function with(PhoneNumberDetailed|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PhoneNumberDetailed|array{
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   callForwardingEnabled?: bool|null,
     *   callRecordingEnabled?: bool|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListingEnabled?: bool|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   countryISOAlpha2?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   deletionLockEnabled?: bool|null,
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   emergencyStatus?: value-of<EmergencyStatus>|null,
     *   externalPin?: string|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   messagingProfileID?: string|null,
     *   messagingProfileName?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   purchasedAt?: string|null,
     *   recordType?: string|null,
     *   sourceType?: value-of<SourceType>|null,
     *   status?: value-of<Status>|null,
     *   t38FaxGatewayEnabled?: bool|null,
     *   tags?: list<string>|null,
     * } $data
     */
    public function withData(PhoneNumberDetailed|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
