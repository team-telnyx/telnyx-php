<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutDetails\Status;

/**
 * @phpstan-type PortoutDetailsShape = array{
 *   id?: string|null,
 *   alreadyPorted?: bool|null,
 *   authorizedName?: string|null,
 *   carrierName?: string|null,
 *   city?: string|null,
 *   createdAt?: string|null,
 *   currentCarrier?: string|null,
 *   endUserName?: string|null,
 *   focDate?: string|null,
 *   hostMessaging?: bool|null,
 *   insertedAt?: string|null,
 *   lsr?: list<string>|null,
 *   phoneNumbers?: list<string>|null,
 *   pon?: string|null,
 *   reason?: string|null,
 *   recordType?: string|null,
 *   rejectionCode?: int|null,
 *   requestedFocDate?: string|null,
 *   serviceAddress?: string|null,
 *   spid?: string|null,
 *   state?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   supportKey?: string|null,
 *   updatedAt?: string|null,
 *   userID?: string|null,
 *   vendor?: string|null,
 *   zip?: string|null,
 * }
 */
final class PortoutDetails implements BaseModel
{
    /** @use SdkModel<PortoutDetailsShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    /**
     * Is true when the number is already ported.
     */
    #[Optional('already_ported')]
    public ?bool $alreadyPorted;

    /**
     * Name of person authorizing the porting order.
     */
    #[Optional('authorized_name')]
    public ?string $authorizedName;

    /**
     * Carrier the number will be ported out to.
     */
    #[Optional('carrier_name')]
    public ?string $carrierName;

    /**
     * City or municipality of billing address.
     */
    #[Optional]
    public ?string $city;

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * The current carrier.
     */
    #[Optional('current_carrier')]
    public ?string $currentCarrier;

    /**
     * Person name or company name requesting the port.
     */
    #[Optional('end_user_name')]
    public ?string $endUserName;

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    #[Optional('foc_date')]
    public ?string $focDate;

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    #[Optional('host_messaging')]
    public ?bool $hostMessaging;

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    #[Optional('inserted_at')]
    public ?string $insertedAt;

    /**
     * The Local Service Request.
     *
     * @var list<string>|null $lsr
     */
    #[Optional(list: 'string')]
    public ?array $lsr;

    /**
     * Phone numbers associated with this portout.
     *
     * @var list<string>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: 'string')]
    public ?array $phoneNumbers;

    /**
     * Port order number assigned by the carrier the number will be ported out to.
     */
    #[Optional]
    public ?string $pon;

    /**
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    #[Optional(nullable: true)]
    public ?string $reason;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The rejection code for one of the valid rejections to reject a port out order.
     */
    #[Optional('rejection_code')]
    public ?int $rejectionCode;

    /**
     * ISO 8601 formatted Date/Time of the user requested FOC date.
     */
    #[Optional('requested_foc_date')]
    public ?string $requestedFocDate;

    /**
     * First line of billing address (street address).
     */
    #[Optional('service_address')]
    public ?string $serviceAddress;

    /**
     * New service provider spid.
     */
    #[Optional]
    public ?string $spid;

    /**
     * State, province, or similar of billing address.
     */
    #[Optional]
    public ?string $state;

    /**
     * Status of portout request.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * A key to reference this port out request when contacting Telnyx customer support.
     */
    #[Optional('support_key')]
    public ?string $supportKey;

    /**
     * ISO 8601 formatted date of when the portout was last updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * Identifies the user (or organization) who requested the port out.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Telnyx partner providing network coverage.
     */
    #[Optional]
    public ?string $vendor;

    /**
     * Postal Code of billing address.
     */
    #[Optional]
    public ?string $zip;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $lsr
     * @param list<string>|null $phoneNumbers
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?bool $alreadyPorted = null,
        ?string $authorizedName = null,
        ?string $carrierName = null,
        ?string $city = null,
        ?string $createdAt = null,
        ?string $currentCarrier = null,
        ?string $endUserName = null,
        ?string $focDate = null,
        ?bool $hostMessaging = null,
        ?string $insertedAt = null,
        ?array $lsr = null,
        ?array $phoneNumbers = null,
        ?string $pon = null,
        ?string $reason = null,
        ?string $recordType = null,
        ?int $rejectionCode = null,
        ?string $requestedFocDate = null,
        ?string $serviceAddress = null,
        ?string $spid = null,
        ?string $state = null,
        Status|string|null $status = null,
        ?string $supportKey = null,
        ?string $updatedAt = null,
        ?string $userID = null,
        ?string $vendor = null,
        ?string $zip = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $alreadyPorted && $self['alreadyPorted'] = $alreadyPorted;
        null !== $authorizedName && $self['authorizedName'] = $authorizedName;
        null !== $carrierName && $self['carrierName'] = $carrierName;
        null !== $city && $self['city'] = $city;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currentCarrier && $self['currentCarrier'] = $currentCarrier;
        null !== $endUserName && $self['endUserName'] = $endUserName;
        null !== $focDate && $self['focDate'] = $focDate;
        null !== $hostMessaging && $self['hostMessaging'] = $hostMessaging;
        null !== $insertedAt && $self['insertedAt'] = $insertedAt;
        null !== $lsr && $self['lsr'] = $lsr;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        null !== $pon && $self['pon'] = $pon;
        null !== $reason && $self['reason'] = $reason;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $rejectionCode && $self['rejectionCode'] = $rejectionCode;
        null !== $requestedFocDate && $self['requestedFocDate'] = $requestedFocDate;
        null !== $serviceAddress && $self['serviceAddress'] = $serviceAddress;
        null !== $spid && $self['spid'] = $spid;
        null !== $state && $self['state'] = $state;
        null !== $status && $self['status'] = $status;
        null !== $supportKey && $self['supportKey'] = $supportKey;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userID && $self['userID'] = $userID;
        null !== $vendor && $self['vendor'] = $vendor;
        null !== $zip && $self['zip'] = $zip;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Is true when the number is already ported.
     */
    public function withAlreadyPorted(bool $alreadyPorted): self
    {
        $self = clone $this;
        $self['alreadyPorted'] = $alreadyPorted;

        return $self;
    }

    /**
     * Name of person authorizing the porting order.
     */
    public function withAuthorizedName(string $authorizedName): self
    {
        $self = clone $this;
        $self['authorizedName'] = $authorizedName;

        return $self;
    }

    /**
     * Carrier the number will be ported out to.
     */
    public function withCarrierName(string $carrierName): self
    {
        $self = clone $this;
        $self['carrierName'] = $carrierName;

        return $self;
    }

    /**
     * City or municipality of billing address.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The current carrier.
     */
    public function withCurrentCarrier(string $currentCarrier): self
    {
        $self = clone $this;
        $self['currentCarrier'] = $currentCarrier;

        return $self;
    }

    /**
     * Person name or company name requesting the port.
     */
    public function withEndUserName(string $endUserName): self
    {
        $self = clone $this;
        $self['endUserName'] = $endUserName;

        return $self;
    }

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    public function withFocDate(string $focDate): self
    {
        $self = clone $this;
        $self['focDate'] = $focDate;

        return $self;
    }

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    public function withHostMessaging(bool $hostMessaging): self
    {
        $self = clone $this;
        $self['hostMessaging'] = $hostMessaging;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    public function withInsertedAt(string $insertedAt): self
    {
        $self = clone $this;
        $self['insertedAt'] = $insertedAt;

        return $self;
    }

    /**
     * The Local Service Request.
     *
     * @param list<string> $lsr
     */
    public function withLsr(array $lsr): self
    {
        $self = clone $this;
        $self['lsr'] = $lsr;

        return $self;
    }

    /**
     * Phone numbers associated with this portout.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Port order number assigned by the carrier the number will be ported out to.
     */
    public function withPon(string $pon): self
    {
        $self = clone $this;
        $self['pon'] = $pon;

        return $self;
    }

    /**
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    public function withReason(?string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The rejection code for one of the valid rejections to reject a port out order.
     */
    public function withRejectionCode(int $rejectionCode): self
    {
        $self = clone $this;
        $self['rejectionCode'] = $rejectionCode;

        return $self;
    }

    /**
     * ISO 8601 formatted Date/Time of the user requested FOC date.
     */
    public function withRequestedFocDate(string $requestedFocDate): self
    {
        $self = clone $this;
        $self['requestedFocDate'] = $requestedFocDate;

        return $self;
    }

    /**
     * First line of billing address (street address).
     */
    public function withServiceAddress(string $serviceAddress): self
    {
        $self = clone $this;
        $self['serviceAddress'] = $serviceAddress;

        return $self;
    }

    /**
     * New service provider spid.
     */
    public function withSpid(string $spid): self
    {
        $self = clone $this;
        $self['spid'] = $spid;

        return $self;
    }

    /**
     * State, province, or similar of billing address.
     */
    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Status of portout request.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * A key to reference this port out request when contacting Telnyx customer support.
     */
    public function withSupportKey(string $supportKey): self
    {
        $self = clone $this;
        $self['supportKey'] = $supportKey;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the portout was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the user (or organization) who requested the port out.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Telnyx partner providing network coverage.
     */
    public function withVendor(string $vendor): self
    {
        $self = clone $this;
        $self['vendor'] = $vendor;

        return $self;
    }

    /**
     * Postal Code of billing address.
     */
    public function withZip(string $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
