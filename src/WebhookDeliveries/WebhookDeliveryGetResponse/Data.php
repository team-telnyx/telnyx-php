<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Attempt\HTTP;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Status;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Webhook;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Webhook\RecordType;

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
    #[Optional]
    public ?string $id;

    /**
     * Detailed delivery attempts, ordered by most recent.
     *
     * @var list<Attempt>|null $attempts
     */
    #[Optional(list: Attempt::class)]
    public ?array $attempts;

    /**
     * ISO 8601 timestamp indicating when the last webhook response has been received.
     */
    #[Optional]
    public ?\DateTimeInterface $finished_at;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 timestamp indicating when the first request attempt was initiated.
     */
    #[Optional]
    public ?\DateTimeInterface $started_at;

    /**
     * Delivery status: 'delivered' when successfuly delivered or 'failed' if all attempts have failed.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Uniquely identifies the user that owns the webhook_delivery record.
     */
    #[Optional]
    public ?string $user_id;

    /**
     * Original webhook JSON data. Payload fields vary according to event type.
     */
    #[Optional]
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
     * @param list<Attempt|array{
     *   errors?: list<int>|null,
     *   finished_at?: \DateTimeInterface|null,
     *   http?: HTTP|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Attempt\Status>|null,
     * }> $attempts
     * @param Status|value-of<Status> $status
     * @param Webhook|array{
     *   id?: string|null,
     *   event_type?: string|null,
     *   occurred_at?: \DateTimeInterface|null,
     *   payload?: mixed,
     *   record_type?: value-of<RecordType>|null,
     * } $webhook
     */
    public static function with(
        ?string $id = null,
        ?array $attempts = null,
        ?\DateTimeInterface $finished_at = null,
        ?string $record_type = null,
        ?\DateTimeInterface $started_at = null,
        Status|string|null $status = null,
        ?string $user_id = null,
        Webhook|array|null $webhook = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $attempts && $obj['attempts'] = $attempts;
        null !== $finished_at && $obj['finished_at'] = $finished_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $started_at && $obj['started_at'] = $started_at;
        null !== $status && $obj['status'] = $status;
        null !== $user_id && $obj['user_id'] = $user_id;
        null !== $webhook && $obj['webhook'] = $webhook;

        return $obj;
    }

    /**
     * Uniquely identifies the webhook_delivery record.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Detailed delivery attempts, ordered by most recent.
     *
     * @param list<Attempt|array{
     *   errors?: list<int>|null,
     *   finished_at?: \DateTimeInterface|null,
     *   http?: HTTP|null,
     *   started_at?: \DateTimeInterface|null,
     *   status?: value-of<Attempt\Status>|null,
     * }> $attempts
     */
    public function withAttempts(array $attempts): self
    {
        $obj = clone $this;
        $obj['attempts'] = $attempts;

        return $obj;
    }

    /**
     * ISO 8601 timestamp indicating when the last webhook response has been received.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $obj = clone $this;
        $obj['finished_at'] = $finishedAt;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 timestamp indicating when the first request attempt was initiated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['started_at'] = $startedAt;

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
        $obj['user_id'] = $userID;

        return $obj;
    }

    /**
     * Original webhook JSON data. Payload fields vary according to event type.
     *
     * @param Webhook|array{
     *   id?: string|null,
     *   event_type?: string|null,
     *   occurred_at?: \DateTimeInterface|null,
     *   payload?: mixed,
     *   record_type?: value-of<RecordType>|null,
     * } $webhook
     */
    public function withWebhook(Webhook|array $webhook): self
    {
        $obj = clone $this;
        $obj['webhook'] = $webhook;

        return $obj;
    }
}
