<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventListResponse\Data\Payload\WebhookPortoutStatusChangedPayload\Status;

/**
 * The webhook payload for the portout.status_changed event.
 *
 * @phpstan-type webhook_portout_status_changed_payload = array{
 *   id?: string|null,
 *   attemptedPin?: string|null,
 *   carrierName?: string|null,
 *   phoneNumbers?: list<string>|null,
 *   rejectionReason?: string|null,
 *   spid?: string|null,
 *   status?: value-of<Status>|null,
 *   subscriberName?: string|null,
 *   userID?: string|null,
 * }
 */
final class WebhookPortoutStatusChangedPayload implements BaseModel
{
    /** @use SdkModel<webhook_portout_status_changed_payload> */
    use SdkModel;

    /**
     * Identifies the port out that was moved.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The PIN that was attempted to be used to authorize the port out.
     */
    #[Api('attempted_pin', optional: true)]
    public ?string $attemptedPin;

    /**
     * Carrier the number will be ported out to.
     */
    #[Api('carrier_name', optional: true)]
    public ?string $carrierName;

    /**
     * Phone numbers associated with this port-out order.
     *
     * @var list<string>|null $phoneNumbers
     */
    #[Api('phone_numbers', list: 'string', optional: true)]
    public ?array $phoneNumbers;

    /**
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    #[Api('rejection_reason', optional: true)]
    public ?string $rejectionReason;

    /**
     * The new carrier SPID.
     */
    #[Api(optional: true)]
    public ?string $spid;

    /**
     * The new status of the port out.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * The name of the port-out's end user.
     */
    #[Api('subscriber_name', optional: true)]
    public ?string $subscriberName;

    /**
     * Identifies the user that the port-out order belongs to.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phoneNumbers
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $attemptedPin = null,
        ?string $carrierName = null,
        ?array $phoneNumbers = null,
        ?string $rejectionReason = null,
        ?string $spid = null,
        Status|string|null $status = null,
        ?string $subscriberName = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $attemptedPin && $obj->attemptedPin = $attemptedPin;
        null !== $carrierName && $obj->carrierName = $carrierName;
        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;
        null !== $rejectionReason && $obj->rejectionReason = $rejectionReason;
        null !== $spid && $obj->spid = $spid;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $subscriberName && $obj->subscriberName = $subscriberName;
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    /**
     * Identifies the port out that was moved.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The PIN that was attempted to be used to authorize the port out.
     */
    public function withAttemptedPin(string $attemptedPin): self
    {
        $obj = clone $this;
        $obj->attemptedPin = $attemptedPin;

        return $obj;
    }

    /**
     * Carrier the number will be ported out to.
     */
    public function withCarrierName(string $carrierName): self
    {
        $obj = clone $this;
        $obj->carrierName = $carrierName;

        return $obj;
    }

    /**
     * Phone numbers associated with this port-out order.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    public function withRejectionReason(string $rejectionReason): self
    {
        $obj = clone $this;
        $obj->rejectionReason = $rejectionReason;

        return $obj;
    }

    /**
     * The new carrier SPID.
     */
    public function withSpid(string $spid): self
    {
        $obj = clone $this;
        $obj->spid = $spid;

        return $obj;
    }

    /**
     * The new status of the port out.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * The name of the port-out's end user.
     */
    public function withSubscriberName(string $subscriberName): self
    {
        $obj = clone $this;
        $obj->subscriberName = $subscriberName;

        return $obj;
    }

    /**
     * Identifies the user that the port-out order belongs to.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
