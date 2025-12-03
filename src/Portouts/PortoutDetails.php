<?php

declare(strict_types=1);

namespace Telnyx\Portouts;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\PortoutDetails\Status;

/**
 * @phpstan-type PortoutDetailsShape = array{
 *   id?: string|null,
 *   already_ported?: bool|null,
 *   authorized_name?: string|null,
 *   carrier_name?: string|null,
 *   city?: string|null,
 *   created_at?: string|null,
 *   current_carrier?: string|null,
 *   end_user_name?: string|null,
 *   foc_date?: string|null,
 *   host_messaging?: bool|null,
 *   inserted_at?: string|null,
 *   lsr?: list<string>|null,
 *   phone_numbers?: list<string>|null,
 *   pon?: string|null,
 *   reason?: string|null,
 *   record_type?: string|null,
 *   rejection_code?: int|null,
 *   requested_foc_date?: string|null,
 *   service_address?: string|null,
 *   spid?: string|null,
 *   state?: string|null,
 *   status?: value-of<Status>|null,
 *   support_key?: string|null,
 *   updated_at?: string|null,
 *   user_id?: string|null,
 *   vendor?: string|null,
 *   zip?: string|null,
 * }
 */
final class PortoutDetails implements BaseModel
{
    /** @use SdkModel<PortoutDetailsShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $id;

    /**
     * Is true when the number is already ported.
     */
    #[Api(optional: true)]
    public ?bool $already_ported;

    /**
     * Name of person authorizing the porting order.
     */
    #[Api(optional: true)]
    public ?string $authorized_name;

    /**
     * Carrier the number will be ported out to.
     */
    #[Api(optional: true)]
    public ?string $carrier_name;

    /**
     * City or municipality of billing address.
     */
    #[Api(optional: true)]
    public ?string $city;

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * The current carrier.
     */
    #[Api(optional: true)]
    public ?string $current_carrier;

    /**
     * Person name or company name requesting the port.
     */
    #[Api(optional: true)]
    public ?string $end_user_name;

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    #[Api(optional: true)]
    public ?string $foc_date;

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    #[Api(optional: true)]
    public ?bool $host_messaging;

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    #[Api(optional: true)]
    public ?string $inserted_at;

    /**
     * The Local Service Request.
     *
     * @var list<string>|null $lsr
     */
    #[Api(list: 'string', optional: true)]
    public ?array $lsr;

    /**
     * Phone numbers associated with this portout.
     *
     * @var list<string>|null $phone_numbers
     */
    #[Api(list: 'string', optional: true)]
    public ?array $phone_numbers;

    /**
     * Port order number assigned by the carrier the number will be ported out to.
     */
    #[Api(optional: true)]
    public ?string $pon;

    /**
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $reason;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The rejection code for one of the valid rejections to reject a port out order.
     */
    #[Api(optional: true)]
    public ?int $rejection_code;

    /**
     * ISO 8601 formatted Date/Time of the user requested FOC date.
     */
    #[Api(optional: true)]
    public ?string $requested_foc_date;

    /**
     * First line of billing address (street address).
     */
    #[Api(optional: true)]
    public ?string $service_address;

    /**
     * New service provider spid.
     */
    #[Api(optional: true)]
    public ?string $spid;

    /**
     * State, province, or similar of billing address.
     */
    #[Api(optional: true)]
    public ?string $state;

    /**
     * Status of portout request.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * A key to reference this port out request when contacting Telnyx customer support.
     */
    #[Api(optional: true)]
    public ?string $support_key;

    /**
     * ISO 8601 formatted date of when the portout was last updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

    /**
     * Identifies the user (or organization) who requested the port out.
     */
    #[Api(optional: true)]
    public ?string $user_id;

    /**
     * Telnyx partner providing network coverage.
     */
    #[Api(optional: true)]
    public ?string $vendor;

    /**
     * Postal Code of billing address.
     */
    #[Api(optional: true)]
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
     * @param list<string> $phone_numbers
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?bool $already_ported = null,
        ?string $authorized_name = null,
        ?string $carrier_name = null,
        ?string $city = null,
        ?string $created_at = null,
        ?string $current_carrier = null,
        ?string $end_user_name = null,
        ?string $foc_date = null,
        ?bool $host_messaging = null,
        ?string $inserted_at = null,
        ?array $lsr = null,
        ?array $phone_numbers = null,
        ?string $pon = null,
        ?string $reason = null,
        ?string $record_type = null,
        ?int $rejection_code = null,
        ?string $requested_foc_date = null,
        ?string $service_address = null,
        ?string $spid = null,
        ?string $state = null,
        Status|string|null $status = null,
        ?string $support_key = null,
        ?string $updated_at = null,
        ?string $user_id = null,
        ?string $vendor = null,
        ?string $zip = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $already_ported && $obj->already_ported = $already_ported;
        null !== $authorized_name && $obj->authorized_name = $authorized_name;
        null !== $carrier_name && $obj->carrier_name = $carrier_name;
        null !== $city && $obj->city = $city;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $current_carrier && $obj->current_carrier = $current_carrier;
        null !== $end_user_name && $obj->end_user_name = $end_user_name;
        null !== $foc_date && $obj->foc_date = $foc_date;
        null !== $host_messaging && $obj->host_messaging = $host_messaging;
        null !== $inserted_at && $obj->inserted_at = $inserted_at;
        null !== $lsr && $obj->lsr = $lsr;
        null !== $phone_numbers && $obj->phone_numbers = $phone_numbers;
        null !== $pon && $obj->pon = $pon;
        null !== $reason && $obj->reason = $reason;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $rejection_code && $obj->rejection_code = $rejection_code;
        null !== $requested_foc_date && $obj->requested_foc_date = $requested_foc_date;
        null !== $service_address && $obj->service_address = $service_address;
        null !== $spid && $obj->spid = $spid;
        null !== $state && $obj->state = $state;
        null !== $status && $obj['status'] = $status;
        null !== $support_key && $obj->support_key = $support_key;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $user_id && $obj->user_id = $user_id;
        null !== $vendor && $obj->vendor = $vendor;
        null !== $zip && $obj->zip = $zip;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Is true when the number is already ported.
     */
    public function withAlreadyPorted(bool $alreadyPorted): self
    {
        $obj = clone $this;
        $obj->already_ported = $alreadyPorted;

        return $obj;
    }

    /**
     * Name of person authorizing the porting order.
     */
    public function withAuthorizedName(string $authorizedName): self
    {
        $obj = clone $this;
        $obj->authorized_name = $authorizedName;

        return $obj;
    }

    /**
     * Carrier the number will be ported out to.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj->carrier_name = $carrierName;

        return $obj;
    }

    /**
     * City or municipality of billing address.
     */
    public function withCity(string $city): self
    {
        $obj = clone $this;
        $obj->city = $city;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * The current carrier.
     */
    public function withCurrentCarrier(string $currentCarrier): self
    {
        $obj = clone $this;
        $obj->current_carrier = $currentCarrier;

        return $obj;
    }

    /**
     * Person name or company name requesting the port.
     */
    public function withEndUserName(string $endUserName): self
    {
        $obj = clone $this;
        $obj->end_user_name = $endUserName;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time of the FOC date.
     */
    public function withFocDate(string $focDate): self
    {
        $obj = clone $this;
        $obj->foc_date = $focDate;

        return $obj;
    }

    /**
     * Indicates whether messaging services should be maintained with Telnyx after the port out completes.
     */
    public function withHostMessaging(bool $hostMessaging): self
    {
        $obj = clone $this;
        $obj->host_messaging = $hostMessaging;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the portout was created.
     */
    public function withInsertedAt(string $insertedAt): self
    {
        $obj = clone $this;
        $obj->inserted_at = $insertedAt;

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
        $obj->lsr = $lsr;

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
        $obj->phone_numbers = $phoneNumbers;

        return $obj;
    }

    /**
     * Port order number assigned by the carrier the number will be ported out to.
     */
    public function withPon(string $pon): self
    {
        $obj = clone $this;
        $obj->pon = $pon;

        return $obj;
    }

    /**
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    public function withReason(?string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * The rejection code for one of the valid rejections to reject a port out order.
     */
    public function withRejectionCode(int $rejectionCode): self
    {
        $obj = clone $this;
        $obj->rejection_code = $rejectionCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted Date/Time of the user requested FOC date.
     */
    public function withRequestedFocDate(string $requestedFocDate): self
    {
        $obj = clone $this;
        $obj->requested_foc_date = $requestedFocDate;

        return $obj;
    }

    /**
     * First line of billing address (street address).
     */
    public function withServiceAddress(string $serviceAddress): self
    {
        $obj = clone $this;
        $obj->service_address = $serviceAddress;

        return $obj;
    }

    /**
     * New service provider spid.
     */
    public function withSpid(string $spid): self
    {
        $obj = clone $this;
        $obj->spid = $spid;

        return $obj;
    }

    /**
     * State, province, or similar of billing address.
     */
    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

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
        $obj->support_key = $supportKey;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the portout was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the user (or organization) who requested the port out.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

        return $obj;
    }

    /**
     * Telnyx partner providing network coverage.
     */
    public function withVendor(string $vendor): self
    {
        $obj = clone $this;
        $obj->vendor = $vendor;

        return $obj;
    }

    /**
     * Postal Code of billing address.
     */
    public function withZip(string $zip): self
    {
        $obj = clone $this;
        $obj->zip = $zip;

        return $obj;
    }
}
