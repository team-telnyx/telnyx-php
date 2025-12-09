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
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Status\Eq;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Webhook;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status][eq], filter[event_type], filter[webhook][contains], filter[attempts][contains], filter[started_at][gte], filter[started_at][lte], filter[finished_at][gte], filter[finished_at][lte].
 *
 * @phpstan-type FilterShape = array{
 *   attempts?: Attempts|null,
 *   eventType?: string|null,
 *   finishedAt?: FinishedAt|null,
 *   startedAt?: StartedAt|null,
 *   status?: Status|null,
 *   webhook?: Webhook|null,
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
     * @param Attempts|array{contains?: string|null} $attempts
     * @param FinishedAt|array{gte?: string|null, lte?: string|null} $finishedAt
     * @param StartedAt|array{gte?: string|null, lte?: string|null} $startedAt
     * @param Status|array{eq?: value-of<Eq>|null} $status
     * @param Webhook|array{contains?: string|null} $webhook
     */
    public static function with(
        Attempts|array|null $attempts = null,
        ?string $eventType = null,
        FinishedAt|array|null $finishedAt = null,
        StartedAt|array|null $startedAt = null,
        Status|array|null $status = null,
        Webhook|array|null $webhook = null,
    ): self {
        $obj = new self;

        null !== $attempts && $obj['attempts'] = $attempts;
        null !== $eventType && $obj['eventType'] = $eventType;
        null !== $finishedAt && $obj['finishedAt'] = $finishedAt;
        null !== $startedAt && $obj['startedAt'] = $startedAt;
        null !== $status && $obj['status'] = $status;
        null !== $webhook && $obj['webhook'] = $webhook;

        return $obj;
    }

    /**
     * @param Attempts|array{contains?: string|null} $attempts
     */
    public function withAttempts(Attempts|array $attempts): self
    {
        $obj = clone $this;
        $obj['attempts'] = $attempts;

        return $obj;
    }

    /**
     * Return only webhook_deliveries matching the given value of `event_type`. Accepts multiple values separated by a `,`.
     */
    public function withEventType(string $eventType): self
    {
        $obj = clone $this;
        $obj['eventType'] = $eventType;

        return $obj;
    }

    /**
     * @param FinishedAt|array{gte?: string|null, lte?: string|null} $finishedAt
     */
    public function withFinishedAt(FinishedAt|array $finishedAt): self
    {
        $obj = clone $this;
        $obj['finishedAt'] = $finishedAt;

        return $obj;
    }

    /**
     * @param StartedAt|array{gte?: string|null, lte?: string|null} $startedAt
     */
    public function withStartedAt(StartedAt|array $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

        return $obj;
    }

    /**
     * @param Status|array{eq?: value-of<Eq>|null} $status
     */
    public function withStatus(Status|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * @param Webhook|array{contains?: string|null} $webhook
     */
    public function withWebhook(Webhook|array $webhook): self
    {
        $obj = clone $this;
        $obj['webhook'] = $webhook;

        return $obj;
    }
}
