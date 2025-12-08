<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallPlaybackStartedWebhookEvent\Data;
use Telnyx\Webhooks\CallPlaybackStartedWebhookEvent\Data\EventType;
use Telnyx\Webhooks\CallPlaybackStartedWebhookEvent\Data\Payload;
use Telnyx\Webhooks\CallPlaybackStartedWebhookEvent\Data\RecordType;

/**
 * @phpstan-type CallPlaybackStartedWebhookEventShape = array{data?: Data|null}
 */
final class CallPlaybackStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallPlaybackStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
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
