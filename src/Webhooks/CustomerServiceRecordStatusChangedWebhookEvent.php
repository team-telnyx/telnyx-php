<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent\Data;
use Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent\Data\EventType;
use Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent\Data\Payload;
use Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent\Data\RecordType;
use Telnyx\Webhooks\CustomerServiceRecordStatusChangedWebhookEvent\Meta;

/**
 * @phpstan-type CustomerServiceRecordStatusChangedWebhookEventShape = array{
 *   data?: Data|null, meta?: Meta|null
 * }
 */
final class CustomerServiceRecordStatusChangedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordStatusChangedWebhookEventShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Data $data;

    #[Api(optional: true)]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   event_type?: value-of<EventType>|null,
     *   occurred_at?: \DateTimeInterface|null,
     *   payload?: Payload|null,
     *   record_type?: value-of<RecordType>|null,
     * } $data
     * @param Meta|array{attempt?: int|null, delivered_to?: string|null} $meta
     */
    public static function with(
        Data|array|null $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   event_type?: value-of<EventType>|null,
     *   occurred_at?: \DateTimeInterface|null,
     *   payload?: Payload|null,
     *   record_type?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{attempt?: int|null, delivered_to?: string|null} $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
