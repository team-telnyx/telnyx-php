<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Porting\Events\EventListResponse\Data;
use Telnyx\Porting\Events\EventListResponse\Data\AvailableNotificationMethod;
use Telnyx\Porting\Events\EventListResponse\Data\EventType;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderDeletedPayload;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderNewCommentPayload;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderSplitPayload;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderStatusChangedPayload;
use Telnyx\Porting\Events\EventListResponse\Data\PayloadStatus;

/**
 * @phpstan-type EventListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class EventListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<EventListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id?: string|null,
     *   available_notification_methods?: list<value-of<AvailableNotificationMethod>>|null,
     *   created_at?: \DateTimeInterface|null,
     *   event_type?: value-of<EventType>|null,
     *   payload?: WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null,
     *   payload_status?: value-of<PayloadStatus>|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id?: string|null,
     *   available_notification_methods?: list<value-of<AvailableNotificationMethod>>|null,
     *   created_at?: \DateTimeInterface|null,
     *   event_type?: value-of<EventType>|null,
     *   payload?: WebhookPortingOrderDeletedPayload|WebhookPortingOrderMessagingChangedPayload|WebhookPortingOrderStatusChangedPayload|WebhookPortingOrderNewCommentPayload|WebhookPortingOrderSplitPayload|null,
     *   payload_status?: value-of<PayloadStatus>|null,
     *   porting_order_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
