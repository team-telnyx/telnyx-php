<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard;
use Telnyx\Messsages\RcsAgentMessage\Event;
use Telnyx\Messsages\RcsAgentMessage\Event\EventType;

/**
 * @phpstan-type RcsAgentMessageShape = array{
 *   contentMessage?: ContentMessage|null,
 *   event?: Event|null,
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
     * @param ContentMessage|array{
     *   contentInfo?: RcsContentInfo|null,
     *   richCard?: RichCard|null,
     *   suggestions?: list<RcsSuggestion>|null,
     *   text?: string|null,
     * } $contentMessage
     * @param Event|array{eventType?: value-of<EventType>|null} $event
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
     * @param ContentMessage|array{
     *   contentInfo?: RcsContentInfo|null,
     *   richCard?: RichCard|null,
     *   suggestions?: list<RcsSuggestion>|null,
     *   text?: string|null,
     * } $contentMessage
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
     * @param Event|array{eventType?: value-of<EventType>|null} $event
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
