<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallStreamingFailed\EventType;
use Telnyx\Webhooks\CallStreamingFailed\Payload;
use Telnyx\Webhooks\CallStreamingFailed\RecordType;

/**
 * @phpstan-type StreamingFailedWebhookEventShape = array{
 *   data?: CallStreamingFailed|null
 * }
 */
final class StreamingFailedWebhookEvent implements BaseModel
{
    /** @use SdkModel<StreamingFailedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallStreamingFailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallStreamingFailed|array{
     *   id?: string|null,
     *   eventType?: value-of<EventType>|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: Payload|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public static function with(CallStreamingFailed|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallStreamingFailed|array{
     *   id?: string|null,
     *   eventType?: value-of<EventType>|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: Payload|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(CallStreamingFailed|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
