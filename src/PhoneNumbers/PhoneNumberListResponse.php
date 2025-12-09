<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\SourceType;
use Telnyx\PhoneNumbers\PhoneNumberDetailed\Status;

/**
 * @phpstan-type PhoneNumberListResponseShape = array{
 *   data?: list<PhoneNumberDetailed>|null, meta?: PaginationMeta|null
 * }
 */
final class PhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<PhoneNumberDetailed>|null $data */
    #[Optional(list: PhoneNumberDetailed::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<PhoneNumberDetailed|array{
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
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<PhoneNumberDetailed|array{
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
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
