<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallForkStartedWebhookEvent\Data;
use Telnyx\Webhooks\CallForkStartedWebhookEvent\Data\EventType;
use Telnyx\Webhooks\CallForkStartedWebhookEvent\Data\Payload;
use Telnyx\Webhooks\CallForkStartedWebhookEvent\Data\RecordType;

/**
 * @phpstan-type CallForkStartedWebhookEventShape = array{data?: Data|null}
 */
final class CallForkStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallForkStartedWebhookEventShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Data $data;

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
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

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
}
