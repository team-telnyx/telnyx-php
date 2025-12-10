<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data\EmergencyStatus;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data\InboundCallScreening;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data\PhoneNumberType;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse\Data\Status;

/**
 * @phpstan-type PhoneNumberSlimListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class PhoneNumberSlimListResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberSlimListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|array{
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   callForwardingEnabled?: bool|null,
     *   callRecordingEnabled?: bool|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListingEnabled?: bool|null,
     *   connectionID?: string|null,
     *   countryISOAlpha2?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   emergencyStatus?: value-of<EmergencyStatus>|null,
     *   externalPin?: string|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   purchasedAt?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   t38FaxGatewayEnabled?: bool|null,
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
     * @param list<Data|array{
     *   id?: string|null,
     *   billingGroupID?: string|null,
     *   callForwardingEnabled?: bool|null,
     *   callRecordingEnabled?: bool|null,
     *   callerIDNameEnabled?: bool|null,
     *   cnamListingEnabled?: bool|null,
     *   connectionID?: string|null,
     *   countryISOAlpha2?: string|null,
     *   createdAt?: string|null,
     *   customerReference?: string|null,
     *   emergencyAddressID?: string|null,
     *   emergencyEnabled?: bool|null,
     *   emergencyStatus?: value-of<EmergencyStatus>|null,
     *   externalPin?: string|null,
     *   inboundCallScreening?: value-of<InboundCallScreening>|null,
     *   phoneNumber?: string|null,
     *   phoneNumberType?: value-of<PhoneNumberType>|null,
     *   purchasedAt?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   t38FaxGatewayEnabled?: bool|null,
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
