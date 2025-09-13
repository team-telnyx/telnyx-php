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
 * @phpstan-type filter_alias = array{
 *   attempts?: Attempts,
 *   eventType?: string,
 *   finishedAt?: FinishedAt,
 *   startedAt?: StartedAt,
 *   status?: Status,
 *   webhook?: Webhook,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Attempts $attempts;

    /**
     * Return only webhook_deliveries matching the given value of `event_type`. Accepts multiple values separated by a `,`.
     */
    #[Api('event_type', optional: true)]
    public ?string $eventType;

    #[Api('finished_at', optional: true)]
    public ?FinishedAt $finishedAt;

    #[Api('started_at', optional: true)]
    public ?StartedAt $startedAt;

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
        ?string $eventType = null,
        ?FinishedAt $finishedAt = null,
        ?StartedAt $startedAt = null,
        ?Status $status = null,
        ?Webhook $webhook = null,
    ): self {
        $obj = new self;

        null !== $attempts && $obj->attempts = $attempts;
        null !== $eventType && $obj->eventType = $eventType;
        null !== $finishedAt && $obj->finishedAt = $finishedAt;
        null !== $startedAt && $obj->startedAt = $startedAt;
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
        $obj->eventType = $eventType;

        return $obj;
    }

    public function withFinishedAt(FinishedAt $finishedAt): self
    {
        $obj = clone $this;
        $obj->finishedAt = $finishedAt;

        return $obj;
    }

    public function withStartedAt(StartedAt $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

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
