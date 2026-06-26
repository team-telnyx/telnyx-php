<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\Attempt;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Status;
use Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Webhook;

/**
 * Record of all attempts to deliver a webhook.
 *
 * @phpstan-import-type AttemptShape from \Telnyx\WebhookDeliveries\Attempt
 * @phpstan-import-type WebhookShape from \Telnyx\WebhookDeliveries\WebhookDeliveryGetResponse\Data\Webhook
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   attempts?: list<Attempt|AttemptShape>|null,
 *   finishedAt?: \DateTimeInterface|null,
 *   recordType?: string|null,
 *   startedAt?: \DateTimeInterface|null,
 *   status?: null|Status|value-of<Status>,
 *   userID?: string|null,
 *   webhook?: null|Webhook|WebhookShape,
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
     * @param list<Attempt|AttemptShape>|null $attempts
     * @param Status|value-of<Status>|null $status
     * @param Webhook|WebhookShape|null $webhook
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $attempts && $self['attempts'] = $attempts;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $status && $self['status'] = $status;
        null !== $userID && $self['userID'] = $userID;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    /**
     * Uniquely identifies the webhook_delivery record.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Detailed delivery attempts, ordered by most recent.
     *
     * @param list<Attempt|AttemptShape> $attempts
     */
    public function withAttempts(array $attempts): self
    {
        $self = clone $this;
        $self['attempts'] = $attempts;

        return $self;
    }

    /**
     * ISO 8601 timestamp indicating when the last webhook response has been received.
     */
    public function withFinishedAt(\DateTimeInterface $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

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
     * ISO 8601 timestamp indicating when the first request attempt was initiated.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * Delivery status: 'delivered' when successfuly delivered or 'failed' if all attempts have failed.
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
     * Uniquely identifies the user that owns the webhook_delivery record.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Original webhook JSON data. Payload fields vary according to event type.
     *
     * @param Webhook|WebhookShape $webhook
     */
    public function withWebhook(Webhook|array $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }
}
