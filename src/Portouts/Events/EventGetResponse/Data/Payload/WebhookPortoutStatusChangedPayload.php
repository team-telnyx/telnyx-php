<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events\EventGetResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventGetResponse\Data\Payload\WebhookPortoutStatusChangedPayload\Status;

/**
 * The webhook payload for the portout.status_changed event.
 *
 * @phpstan-type WebhookPortoutStatusChangedPayloadShape = array{
 *   id?: string|null,
 *   attempted_pin?: string|null,
 *   carrier_name?: string|null,
 *   phone_numbers?: list<string>|null,
 *   rejection_reason?: string|null,
 *   spid?: string|null,
 *   status?: value-of<Status>|null,
 *   subscriber_name?: string|null,
 *   user_id?: string|null,
 * }
 */
final class WebhookPortoutStatusChangedPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortoutStatusChangedPayloadShape> */
    use SdkModel;

    /**
     * Identifies the port out that was moved.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The PIN that was attempted to be used to authorize the port out.
     */
    #[Api(optional: true)]
    public ?string $attempted_pin;

    /**
     * Carrier the number will be ported out to.
     */
    #[Api(optional: true)]
    public ?string $carrier_name;

    /**
     * Phone numbers associated with this port-out order.
     *
     * @var list<string>|null $phone_numbers
     */
    #[Api(list: 'string', optional: true)]
    public ?array $phone_numbers;

    /**
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    #[Api(optional: true)]
    public ?string $rejection_reason;

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
    #[Api(optional: true)]
    public ?string $subscriber_name;

    /**
     * Identifies the user that the port-out order belongs to.
     */
    #[Api(optional: true)]
    public ?string $user_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phone_numbers
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $attempted_pin = null,
        ?string $carrier_name = null,
        ?array $phone_numbers = null,
        ?string $rejection_reason = null,
        ?string $spid = null,
        Status|string|null $status = null,
        ?string $subscriber_name = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $attempted_pin && $obj->attempted_pin = $attempted_pin;
        null !== $carrier_name && $obj->carrier_name = $carrier_name;
        null !== $phone_numbers && $obj->phone_numbers = $phone_numbers;
        null !== $rejection_reason && $obj->rejection_reason = $rejection_reason;
        null !== $spid && $obj->spid = $spid;
        null !== $status && $obj['status'] = $status;
        null !== $subscriber_name && $obj->subscriber_name = $subscriber_name;
        null !== $user_id && $obj->user_id = $user_id;

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
        $obj->attempted_pin = $attemptedPin;

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
     * Phone numbers associated with this port-out order.
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
     * The reason why the order is being rejected by the user. If the order is authorized, this field can be left null.
     */
    public function withRejectionReason(string $rejectionReason): self
    {
        $obj = clone $this;
        $obj->rejection_reason = $rejectionReason;

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
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The name of the port-out's end user.
     */
    public function withSubscriberName(string $subscriberName): self
    {
        $obj = clone $this;
        $obj->subscriber_name = $subscriberName;

        return $obj;
    }

    /**
     * Identifies the user that the port-out order belongs to.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

        return $obj;
    }
}
