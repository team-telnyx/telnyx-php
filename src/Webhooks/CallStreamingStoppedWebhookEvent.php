<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallStreamingStopped\EventType;
use Telnyx\Webhooks\CallStreamingStopped\Payload;
use Telnyx\Webhooks\CallStreamingStopped\RecordType;

/**
 * @phpstan-type CallStreamingStoppedWebhookEventShape = array{
 *   data?: CallStreamingStopped|null
 * }
 */
final class CallStreamingStoppedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallStreamingStoppedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallStreamingStopped $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallStreamingStopped|array{
     *   id?: string|null,
     *   eventType?: value-of<EventType>|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: Payload|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public static function with(CallStreamingStopped|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallStreamingStopped|array{
     *   id?: string|null,
     *   eventType?: value-of<EventType>|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: Payload|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(CallStreamingStopped|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
