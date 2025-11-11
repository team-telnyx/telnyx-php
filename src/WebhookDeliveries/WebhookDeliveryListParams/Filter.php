<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries\WebhookDeliveryListParams;

use Telnyx\Core\Attributes\Api;
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
 * @phpstan-type FilterShape = array{
 *   attempts?: Attempts|null,
 *   event_type?: string|null,
 *   finished_at?: FinishedAt|null,
 *   started_at?: StartedAt|null,
 *   status?: Status|null,
 *   webhook?: Webhook|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Attempts $attempts;

    /**
     * Return only webhook_deliveries matching the given value of `event_type`. Accepts multiple values separated by a `,`.
     */
    #[Api(optional: true)]
    public ?string $event_type;

    #[Api(optional: true)]
    public ?FinishedAt $finished_at;

    #[Api(optional: true)]
    public ?StartedAt $started_at;

    #[Api(optional: true)]
    public ?Status $status;

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
     */
    public static function with(
        ?Attempts $attempts = null,
        ?string $event_type = null,
        ?FinishedAt $finished_at = null,
        ?StartedAt $started_at = null,
        ?Status $status = null,
        ?Webhook $webhook = null,
    ): self {
        $obj = new self;

        null !== $attempts && $obj->attempts = $attempts;
        null !== $event_type && $obj->event_type = $event_type;
        null !== $finished_at && $obj->finished_at = $finished_at;
        null !== $started_at && $obj->started_at = $started_at;
        null !== $status && $obj->status = $status;
        null !== $webhook && $obj->webhook = $webhook;

        return $obj;
    }

    public function withAttempts(Attempts $attempts): self
    {
        $obj = clone $this;
        $obj->attempts = $attempts;

        return $obj;
    }

    /**
     * Return only webhook_deliveries matching the given value of `event_type`. Accepts multiple values separated by a `,`.
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj->event_type = $eventType;

        return $obj;
    }

    public function withFinishedAt(FinishedAt $finishedAt): self
    {
        $obj = clone $this;
        $obj->finished_at = $finishedAt;

        return $obj;
    }

    public function withStartedAt(StartedAt $startedAt): self
    {
        $obj = clone $this;
        $obj->started_at = $startedAt;

        return $obj;
    }

    public function withStatus(Status $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    public function withWebhook(Webhook $webhook): self
    {
        $obj = clone $this;
        $obj->webhook = $webhook;

        return $obj;
    }
}
