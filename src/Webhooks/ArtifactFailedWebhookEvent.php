<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\ArtifactFailedWebhookEvent\Data;
use Telnyx\Webhooks\ArtifactFailedWebhookEvent\Event;

/**
 * @phpstan-import-type DataShape from \Telnyx\Webhooks\ArtifactFailedWebhookEvent\Data
 *
 * @phpstan-type ArtifactFailedWebhookEventShape = array{
 *   id: string,
 *   data: Data|DataShape,
 *   event: Event|value-of<Event>,
 *   occurredAt: \DateTimeInterface,
 *   version: string,
 * }
 */
final class ArtifactFailedWebhookEvent implements BaseModel
{
    /** @use SdkModel<ArtifactFailedWebhookEventShape> */
    use SdkModel;

    /**
     * Unique event id; deduplicate deliveries on it.
     */
    #[Required]
    public string $id;

    /**
     * Failed artifact reference and reason.
     */
    #[Required]
    public Data $data;

    /**
     * Event type.
     *
     * @var value-of<Event> $event
     */
    #[Required(enum: Event::class)]
    public string $event;

    /**
     * When the event occurred.
     */
    #[Required('occurred_at')]
    public \DateTimeInterface $occurredAt;

    /**
     * Envelope version.
     */
    #[Required]
    public string $version;

    /**
     * `new ArtifactFailedWebhookEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ArtifactFailedWebhookEvent::with(
     *   id: ..., data: ..., event: ..., occurredAt: ..., version: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ArtifactFailedWebhookEvent)
     *   ->withID(...)
     *   ->withData(...)
     *   ->withEvent(...)
     *   ->withOccurredAt(...)
     *   ->withVersion(...)
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
     * @param Data|DataShape $data
     * @param Event|value-of<Event> $event
     */
    public static function with(
        string $id,
        Data|array $data,
        Event|string $event,
        \DateTimeInterface $occurredAt,
        string $version,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['data'] = $data;
        $self['event'] = $event;
        $self['occurredAt'] = $occurredAt;
        $self['version'] = $version;

        return $self;
    }

    /**
     * Unique event id; deduplicate deliveries on it.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Failed artifact reference and reason.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * Event type.
     *
     * @param Event|value-of<Event> $event
     */
    public function withEvent(Event|string $event): self
    {
        $self = clone $this;
        $self['event'] = $event;

        return $self;
    }

    /**
     * When the event occurred.
     */
    public function withOccurredAt(\DateTimeInterface $occurredAt): self
    {
        $self = clone $this;
        $self['occurredAt'] = $occurredAt;

        return $self;
    }

    /**
     * Envelope version.
     */
    public function withVersion(string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
