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
 *   finishedAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   startedAt?: \DateTimeInterface|null,
 *   status?: value-of<Status>|null,
 *   userID?: string|null,
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
    #[Optional('finished_at')]
    public ?\DateTimeInterface $finishedAt;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 timestamp indicating when the first request attempt was initiated.
     */
    #[Optional('started_at')]
    public ?\DateTimeInterface $startedAt;

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
    #[Optional('user_id')]
    public ?string $userID;

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
     *   finishedAt?: \DateTimeInterface|null,
     *   http?: HTTP|null,
     *   startedAt?: \DateTimeInterface|null,
     *   status?: value-of<Attempt\Status>|null,
     * }> $attempts
     * @param Status|value-of<Status> $status
     * @param Webhook|array{
     *   id?: string|null,
     *   eventType?: string|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: mixed,
     *   recordType?: value-of<RecordType>|null,
     * } $webhook
     */
    public static function with(
        ?string $id = null,
        ?array $attempts = null,
        ?\DateTimeInterface $finishedAt = null,
        ?string $recordType = null,
        ?\DateTimeInterface $startedAt = null,
        Status|string|null $status = null,
        ?string $userID = null,
        Webhook|array|null $webhook = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $attempts && $obj['attempts'] = $attempts;
        null !== $finishedAt && $obj['finishedAt'] = $finishedAt;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $startedAt && $obj['startedAt'] = $startedAt;
        null !== $status && $obj['status'] = $status;
        null !== $userID && $obj['userID'] = $userID;
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
     *   finishedAt?: \DateTimeInterface|null,
     *   http?: HTTP|null,
     *   startedAt?: \DateTimeInterface|null,
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
        $obj['finishedAt'] = $finishedAt;

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
     * ISO 8601 timestamp indicating when the first request attempt was initiated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

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
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * Original webhook JSON data. Payload fields vary according to event type.
     *
     * @param Webhook|array{
     *   id?: string|null,
     *   eventType?: string|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: mixed,
     *   recordType?: value-of<RecordType>|null,
     * } $webhook
     */
    public function withWebhook(Webhook|array $webhook): self
    {
        $obj = clone $this;
        $obj['webhook'] = $webhook;

        return $obj;
    }
}
