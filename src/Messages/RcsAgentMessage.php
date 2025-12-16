<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsAgentMessage\ContentMessage;
use Telnyx\Messages\RcsAgentMessage\Event;

/**
 * @phpstan-import-type ContentMessageShape from \Telnyx\Messages\RcsAgentMessage\ContentMessage
 * @phpstan-import-type EventShape from \Telnyx\Messages\RcsAgentMessage\Event
 *
 * @phpstan-type RcsAgentMessageShape = array{
 *   contentMessage?: null|ContentMessage|ContentMessageShape,
 *   event?: null|Event|EventShape,
 *   expireTime?: \DateTimeInterface|null,
 *   ttl?: string|null,
 * }
 */
final class RcsAgentMessage implements BaseModel
{
    /** @use SdkModel<RcsAgentMessageShape> */
    use SdkModel;

    #[Optional('content_message')]
    public ?ContentMessage $contentMessage;

    /**
     * RCS Event to send to the recipient.
     */
    #[Optional]
    public ?Event $event;

    /**
     * Timestamp in UTC of when this message is considered expired.
     */
    #[Optional('expire_time')]
    public ?\DateTimeInterface $expireTime;

    /**
     * Duration in seconds ending with 's'.
     */
    #[Optional]
    public ?string $ttl;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ContentMessageShape $contentMessage
     * @param EventShape $event
     */
    public static function with(
        ContentMessage|array|null $contentMessage = null,
        Event|array|null $event = null,
        ?\DateTimeInterface $expireTime = null,
        ?string $ttl = null,
    ): self {
        $self = new self;

        null !== $contentMessage && $self['contentMessage'] = $contentMessage;
        null !== $event && $self['event'] = $event;
        null !== $expireTime && $self['expireTime'] = $expireTime;
        null !== $ttl && $self['ttl'] = $ttl;

        return $self;
    }

    /**
     * @param ContentMessageShape $contentMessage
     */
    public function withContentMessage(
        ContentMessage|array $contentMessage
    ): self {
        $self = clone $this;
        $self['contentMessage'] = $contentMessage;

        return $self;
    }

    /**
     * RCS Event to send to the recipient.
     *
     * @param EventShape $event
     */
    public function withEvent(Event|array $event): self
    {
        $self = clone $this;
        $self['event'] = $event;

        return $self;
    }

    /**
     * Timestamp in UTC of when this message is considered expired.
     */
    public function withExpireTime(\DateTimeInterface $expireTime): self
    {
        $self = clone $this;
        $self['expireTime'] = $expireTime;

        return $self;
    }

    /**
     * Duration in seconds ending with 's'.
     */
    public function withTtl(string $ttl): self
    {
        $self = clone $this;
        $self['ttl'] = $ttl;

        return $self;
    }
}
