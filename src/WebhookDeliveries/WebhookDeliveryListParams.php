<?php

declare(strict_types=1);

namespace Telnyx\WebhookDeliveries;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Attempts;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\FinishedAt;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\StartedAt;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Status;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Filter\Webhook;
use Telnyx\WebhookDeliveries\WebhookDeliveryListParams\Page;

/**
 * Lists webhook_deliveries for the authenticated user.
 *
 * @see Telnyx\Services\WebhookDeliveriesService::list()
 *
 * @phpstan-type WebhookDeliveryListParamsShape = array{
 *   filter?: Filter|array{
 *     attempts?: Attempts|null,
 *     eventType?: string|null,
 *     finishedAt?: FinishedAt|null,
 *     startedAt?: StartedAt|null,
 *     status?: Status|null,
 *     webhook?: Webhook|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
 * }
 */
final class WebhookDeliveryListParams implements BaseModel
{
    /** @use SdkModel<WebhookDeliveryListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status][eq], filter[event_type], filter[webhook][contains], filter[attempts][contains], filter[started_at][gte], filter[started_at][lte], filter[finished_at][gte], filter[finished_at][lte].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|array{
     *   attempts?: Attempts|null,
     *   eventType?: string|null,
     *   finishedAt?: FinishedAt|null,
     *   startedAt?: StartedAt|null,
     *   status?: Status|null,
     *   webhook?: Webhook|null,
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[status][eq], filter[event_type], filter[webhook][contains], filter[attempts][contains], filter[started_at][gte], filter[started_at][lte], filter[finished_at][gte], filter[finished_at][lte].
     *
     * @param Filter|array{
     *   attempts?: Attempts|null,
     *   eventType?: string|null,
     *   finishedAt?: FinishedAt|null,
     *   startedAt?: StartedAt|null,
     *   status?: Status|null,
     *   webhook?: Webhook|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
