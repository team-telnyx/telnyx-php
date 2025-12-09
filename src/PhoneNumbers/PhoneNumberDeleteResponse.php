<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse\Data\Status;

/**
 * @phpstan-type PhoneNumberDeleteResponseShape = array{data?: Data|null}
 */
final class PhoneNumberDeleteResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberDeleteResponseShape> */
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
     *   billingGroupID?: string|null,
     *   callForwardingEnabled?: bool|null,
     *   callRecordingEnabled?: bool|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListingEnabled?: bool|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   deletionLockEnabled?: bool|null,
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   externalPin?: string|null,
     *   messagingProfileID?: string|null,
     *   messagingProfileName?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   purchasedAt?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   t38FaxGatewayEnabled?: bool|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
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
     *   billingGroupID?: string|null,
     *   callForwardingEnabled?: bool|null,
     *   callRecordingEnabled?: bool|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListingEnabled?: bool|null,
     *   connectionID?: string|null,
     *   connectionName?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   deletionLockEnabled?: bool|null,
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   externalPin?: string|null,
     *   messagingProfileID?: string|null,
     *   messagingProfileName?: string|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   purchasedAt?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   t38FaxGatewayEnabled?: bool|null,
     *   tags?: list<string>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
