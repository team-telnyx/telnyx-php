<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Events;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Portouts\Events\EventListResponse\Data;
use Telnyx\Portouts\Events\EventListResponse\Data\AvailableNotificationMethod;
use Telnyx\Portouts\Events\EventListResponse\Data\EventType;
use Telnyx\Portouts\Events\EventListResponse\Data\Payload\WebhookPortoutFocDateChangedPayload;
use Telnyx\Portouts\Events\EventListResponse\Data\Payload\WebhookPortoutNewCommentPayload;
use Telnyx\Portouts\Events\EventListResponse\Data\Payload\WebhookPortoutStatusChangedPayload;
use Telnyx\Portouts\Events\EventListResponse\Data\PayloadStatus;

/**
 * @phpstan-type EventListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class EventListResponse implements BaseModel
{
    /** @use SdkModel<EventListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
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
     *   payload?: WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null,
     *   payload_status?: value-of<PayloadStatus>|null,
     *   portout_id?: string|null,
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
     *   payload?: WebhookPortoutStatusChangedPayload|WebhookPortoutNewCommentPayload|WebhookPortoutFocDateChangedPayload|null,
     *   payload_status?: value-of<PayloadStatus>|null,
     *   portout_id?: string|null,
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
