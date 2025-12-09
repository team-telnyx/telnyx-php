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
        $obj = new self;

        null !== $contentMessage && $obj['contentMessage'] = $contentMessage;
        null !== $event && $obj['event'] = $event;
        null !== $expireTime && $obj['expireTime'] = $expireTime;
        null !== $ttl && $obj['ttl'] = $ttl;

        return $obj;
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
        $obj = clone $this;
        $obj['contentMessage'] = $contentMessage;

        return $obj;
    }

    /**
     * RCS Event to send to the recipient.
     *
     * @param Event|array{eventType?: value-of<EventType>|null} $event
     */
    public function withEvent(Event|array $event): self
    {
        $obj = clone $this;
        $obj['event'] = $event;

        return $obj;
    }

    /**
     * Timestamp in UTC of when this message is considered expired.
     */
    public function withExpireTime(\DateTimeInterface $expireTime): self
    {
        $obj = clone $this;
        $obj['expireTime'] = $expireTime;

        return $obj;
    }

    /**
     * Duration in seconds ending with 's'.
     */
    public function withTtl(string $ttl): self
    {
        $obj = clone $this;
        $obj['ttl'] = $ttl;

        return $obj;
    }
}
