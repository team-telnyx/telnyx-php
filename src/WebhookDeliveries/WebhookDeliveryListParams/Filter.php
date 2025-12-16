<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Attempts;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\FinishedAt;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\StartedAt;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Status;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Webhook;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status][eq], filter[event_type], filter[webhook][contains], filter[attempts][contains], filter[started_at][gte], filter[started_at][lte], filter[finished_at][gte], filter[finished_at][lte].
 *
 * @phpstan-import-type AttemptsShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Attempts
 * @phpstan-import-type FinishedAtShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\FinishedAt
 * @phpstan-import-type StartedAtShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\StartedAt
 * @phpstan-import-type StatusShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Status
 * @phpstan-import-type WebhookShape from \Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Webhook
 *
 * @phpstan-type FilterShape = array{
 *   attempts?: null|Attempts|AttemptsShape,
 *   eventType?: string|null,
 *   finishedAt?: null|FinishedAt|FinishedAtShape,
 *   startedAt?: null|StartedAt|StartedAtShape,
 *   status?: null|Status|StatusShape,
 *   webhook?: null|Webhook|WebhookShape,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Optional]
    public ?Attempts $attempts;

    /**
     * Return only webhook_deliveries matching the given value of `event_type`. Accepts multiple values separated by a `,`.
     */
    #[Optional('event_type')]
    public ?string $eventType;

    #[Optional('finished_at')]
    public ?FinishedAt $finishedAt;

    #[Optional('started_at')]
    public ?StartedAt $startedAt;

    #[Optional]
    public ?Status $status;

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
     * @param AttemptsShape $attempts
     * @param FinishedAtShape $finishedAt
     * @param StartedAtShape $startedAt
     * @param StatusShape $status
     * @param WebhookShape $webhook
     */
    public static function with(
        Attempts|array|null $attempts = null,
        ?string $eventType = null,
        FinishedAt|array|null $finishedAt = null,
        StartedAt|array|null $startedAt = null,
        Status|array|null $status = null,
        Webhook|array|null $webhook = null,
    ): self {
        $self = new self;

        null !== $attempts && $self['attempts'] = $attempts;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $finishedAt && $self['finishedAt'] = $finishedAt;
        null !== $startedAt && $self['startedAt'] = $startedAt;
        null !== $status && $self['status'] = $status;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    /**
     * @param AttemptsShape $attempts
     */
    public function withAttempts(Attempts|array $attempts): self
    {
        $self = clone $this;
        $self['attempts'] = $attempts;

        return $self;
    }

    /**
     * Return only webhook_deliveries matching the given value of `event_type`. Accepts multiple values separated by a `,`.
     */
    public function withEventType(string $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * @param FinishedAtShape $finishedAt
     */
    public function withFinishedAt(FinishedAt|array $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    /**
     * @param StartedAtShape $startedAt
     */
    public function withStartedAt(StartedAt|array $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * @param StatusShape $status
     */
    public function withStatus(Status|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param WebhookShape $webhook
     */
    public function withWebhook(Webhook|array $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }
}
