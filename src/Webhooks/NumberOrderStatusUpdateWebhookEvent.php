<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberOrders\NumberOrderWithPhoneNumbers;
use Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent\Data;
use Telnyx\Webhooks\NumberOrderStatusUpdateWebhookEvent\Meta;

/**
 * @phpstan-type NumberOrderStatusUpdateWebhookEventShape = array{
 *   data: Data, meta: Meta
 * }
 */
final class NumberOrderStatusUpdateWebhookEvent implements BaseModel
{
    /** @use SdkModel<NumberOrderStatusUpdateWebhookEventShape> */
    use SdkModel;

    #[Api]
    public Data $data;

    #[Api]
    public Meta $meta;

    /**
     * `new NumberOrderStatusUpdateWebhookEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberOrderStatusUpdateWebhookEvent::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberOrderStatusUpdateWebhookEvent)->withData(...)->withMeta(...)
     * ```
     */
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
     *   id: string,
     *   event_type: string,
     *   occurred_at: \DateTimeInterface,
     *   payload: NumberOrderWithPhoneNumbers,
     *   record_type: string,
     * } $data
     * @param Meta|array{attempt: int, delivered_to: string} $meta
     */
    public static function with(Data|array $data, Meta|array $meta): self
    {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id: string,
     *   event_type: string,
     *   occurred_at: \DateTimeInterface,
     *   payload: NumberOrderWithPhoneNumbers,
     *   record_type: string,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{attempt: int, delivered_to: string} $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
