<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Attempt;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Status;
use Telnyx\WebhookDeliveries\WebhookDeliveryListResponse\Data\Webhook;

/**
 * Record of all attempts to deliver a webhook.
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   attempts?: list<Attempt>|null,
 *   finished_at?: \DateTimeInterface|null,
 *   record_type?: string|null,
 *   started_at?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   user_id?: string|null,
 *   webhook?: Webhook|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies the webhook_delivery record.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Detailed delivery attempts, ordered by most recent.
     *
     * @var list<Attempt>|null $attempts
     */
    #[Api(list: Attempt::class, optional: true)]
    public ?array $attempts;

    /**
     * ISO 8601 timestamp indicating when the last webhook response has been received.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $finished_at;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 timestamp indicating when the first request attempt was initiated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $started_at;

    /**
     * Delivery status: 'delivered' when successfuly delivered or 'failed' if all attempts have failed.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Uniquely identifies the user that owns the webhook_delivery record.
     */
    #[Api(optional: true)]
    public ?string $user_id;

    /**
     * Original webhook JSON data. Payload fields vary according to event type.
     */
    #[Api(optional: true)]
    public ?Webhook $webhook;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Attempt> $attempts
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?array $attempts = null,
        ?\DateTimeInterface $finished_at = null,
        ?string $record_type = null,
        ?\DateTimeInterface $started_at = null,
        Status|string|null $status = null,
        ?string $user_id = null,
        ?Webhook $webhook = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $attempts && $obj->attempts = $attempts;
        null !== $finished_at && $obj->finished_at = $finished_at;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $started_at && $obj->started_at = $started_at;
        null !== $status && $obj['status'] = $status;
        null !== $user_id && $obj->user_id = $user_id;
        null !== $webhook && $obj->webhook = $webhook;

        return $obj;
    }

    /**
     * Uniquely identifies the webhook_delivery record.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Detailed delivery attempts, ordered by most recent.
     *
     * @param list<Attempt> $attempts
     */
    public function withAttempts(array $attempts): self
    {
        $obj = clone $this;
        $obj->attempts = $attempts;

        return $obj;
    }

    /**
     * ISO 8601 timestamp indicating when the last webhook response has been received.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj->finished_at = $finishedAt;

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
     * ISO 8601 timestamp indicating when the first request attempt was initiated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->started_at = $startedAt;

        return $obj;
    }

    /**
     * Delivery status: 'delivered' when successfuly delivered or 'failed' if all attempts have failed.
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
     * Uniquely identifies the user that owns the webhook_delivery record.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->user_id = $userID;

        return $obj;
    }

    /**
     * Original webhook JSON data. Payload fields vary according to event type.
     */
    public function withWebhook(Webhook $webhook): self
    {
        $obj = clone $this;
        $obj->webhook = $webhook;

        return $obj;
    }
}
