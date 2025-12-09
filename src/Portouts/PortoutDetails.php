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
 *   status?: value-of<Status>|null,
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
     * @param list<string> $lsr
     * @param list<string> $phoneNumbers
     * @param Status|value-of<Status> $status
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $alreadyPorted && $obj['alreadyPorted'] = $alreadyPorted;
        null !== $authorizedName && $obj['authorizedName'] = $authorizedName;
        null !== $carrierName && $obj['carrierName'] = $carrierName;
        null !== $city && $obj['city'] = $city;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $currentCarrier && $obj['currentCarrier'] = $currentCarrier;
        null !== $endUserName && $obj['endUserName'] = $endUserName;
        null !== $focDate && $obj['focDate'] = $focDate;
        null !== $hostMessaging && $obj['hostMessaging'] = $hostMessaging;
        null !== $insertedAt && $obj['insertedAt'] = $insertedAt;
        null !== $lsr && $obj['lsr'] = $lsr;
        null !== $phoneNumbers && $obj['phoneNumbers'] = $phoneNumbers;
        null !== $pon && $obj['pon'] = $pon;
        null !== $reason && $obj['reason'] = $reason;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $rejectionCode && $obj['rejectionCode'] = $rejectionCode;
        null !== $requestedFocDate && $obj['requestedFocDate'] = $requestedFocDate;
        null !== $serviceAddress && $obj['serviceAddress'] = $serviceAddress;
        null !== $spid && $obj['spid'] = $spid;
        null !== $state && $obj['state'] = $state;
        null !== $status && $obj['status'] = $status;
        null !== $supportKey && $obj['supportKey'] = $supportKey;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $userID && $obj['userID'] = $userID;
        null !== $vendor && $obj['vendor'] = $vendor;
        null !== $zip && $obj['zip'] = $zip;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Is true when the number is already ported.
     */
    public function withAlreadyPorted(bool $alreadyPorted): self
    {
        $obj = clone $this;
        $obj['alreadyPorted'] = $alreadyPorted;

        return $obj;
    }

    /**
     * Name of person authorizing the porting order.
     */
    public function withAuthorizedName(string $authorizedName): self
    {
        $obj = clone $this;
        $obj['authorizedName'] = $authorizedName;

        return $obj;
    }

    /**
     * Carrier the number will be ported out to.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj['carrierName'] = $carrierName;

        return $obj;
    }

    /**
     * City or municipality of billing address.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj['city'] = $city;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The current carrier.
     */
    public function withCurrentCarrier(string $currentCarrier): self
    {
        $obj = clone $this;
        $obj['currentCarrier'] = $currentCarrier;

        return $obj;
    }

    /**
     * Person name or company name requesting the port.
     */
    public function withEndUserName(string $endUserName): self
    {
        $obj = clone $this;
        $obj['endUserName'] = $endUserName;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    public function withFocDate(string $focDate): self
    {
        $obj = clone $this;
        $obj['focDate'] = $focDate;

        return $obj;
    }

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    public function withHostMessaging(bool $hostMessaging): self
    {
        $obj = clone $this;
        $obj['hostMessaging'] = $hostMessaging;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    public function withInsertedAt(string $insertedAt): self
    {
        $obj = clone $this;
        $obj['insertedAt'] = $insertedAt;

        return $obj;
    }

    /**
     * The Local Service Request.
     *
     * @param list<string> $lsr
     */
    public function withLsr(array $lsr): self
    {
        $obj = clone $this;
        $obj['lsr'] = $lsr;

        return $obj;
    }

    /**
     * Phone numbers associated with this portout.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Port order number assigned by the carrier the number will be ported out to.
     */
    public function withPon(string $pon): self
    {
        $obj = clone $this;
        $obj['pon'] = $pon;

        return $obj;
    }

    /**
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    public function withReason(?string $reason): self
    {
        $obj = clone $this;
        $obj['reason'] = $reason;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The rejection code for one of the valid rejections to reject a port out order.
     */
    public function withRejectionCode(int $rejectionCode): self
    {
        $obj = clone $this;
        $obj['rejectionCode'] = $rejectionCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time of the user requested FOC date.
     */
    public function withRequestedFocDate(string $requestedFocDate): self
    {
        $obj = clone $this;
        $obj['requestedFocDate'] = $requestedFocDate;

        return $obj;
    }

    /**
     * First line of billing address (street address).
     */
    public function withServiceAddress(string $serviceAddress): self
    {
        $obj = clone $this;
        $obj['serviceAddress'] = $serviceAddress;

        return $obj;
    }

    /**
     * New service provider spid.
     */
    public function withSpid(string $spid): self
    {
        $obj = clone $this;
        $obj['spid'] = $spid;

        return $obj;
    }

    /**
     * State, province, or similar of billing address.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj['state'] = $state;

        return $obj;
    }

    /**
     * Status of portout request.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * A key to reference this port out request when contacting Telnyx customer support.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj['supportKey'] = $supportKey;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the portout was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the user (or organization) who requested the port out.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * Telnyx partner providing network coverage.
     */
    public function withVendor(string $vendor): self
    {
        $obj = clone $this;
        $obj['vendor'] = $vendor;

        return $obj;
    }

    /**
     * Postal Code of billing address.
     */
    public function withZip(string $zip): self
    {
        $obj = clone $this;
        $obj['zip'] = $zip;

        return $obj;
    }
}
