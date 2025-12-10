<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallStreamingStarted\EventType;
use Telnyx\Webhooks\CallStreamingStarted\Payload;
use Telnyx\Webhooks\CallStreamingStarted\RecordType;

/**
 * @phpstan-type CallStreamingStartedWebhookEventShape = array{
 *   data?: CallStreamingStarted|null
 * }
 */
final class CallStreamingStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallStreamingStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallStreamingStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallStreamingStarted|array{
     *   id?: string|null,
     *   eventType?: value-of<EventType>|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: Payload|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public static function with(CallStreamingStarted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallStreamingStarted|array{
     *   id?: string|null,
     *   eventType?: value-of<EventType>|null,
     *   occurredAt?: \DateTimeInterface|null,
     *   payload?: Payload|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(CallStreamingStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
