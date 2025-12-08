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
 *   content_message?: ContentMessage|null,
 *   event?: Event|null,
 *   expire_time?: \DateTimeInterface|null,
 *   ttl?: string|null,
 * }
 */
final class RcsAgentMessage implements BaseModel
{
    /** @use SdkModel<RcsAgentMessageShape> */
    use SdkModel;

    #[Optional]
    public ?ContentMessage $content_message;

    /**
     * RCS Event to send to the recipient.
     */
    #[Optional]
    public ?Event $event;

    /**
     * Timestamp in UTC of when this message is considered expired.
     */
    #[Optional]
    public ?\DateTimeInterface $expire_time;

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
     *   content_info?: RcsContentInfo|null,
     *   rich_card?: RichCard|null,
     *   suggestions?: list<RcsSuggestion>|null,
     *   text?: string|null,
     * } $content_message
     * @param Event|array{event_type?: value-of<EventType>|null} $event
     */
    public static function with(
        ContentMessage|array|null $content_message = null,
        Event|array|null $event = null,
        ?\DateTimeInterface $expire_time = null,
        ?string $ttl = null,
    ): self {
        $obj = new self;

        null !== $content_message && $obj['content_message'] = $content_message;
        null !== $event && $obj['event'] = $event;
        null !== $expire_time && $obj['expire_time'] = $expire_time;
        null !== $ttl && $obj['ttl'] = $ttl;

        return $obj;
    }

    /**
     * @param ContentMessage|array{
     *   content_info?: RcsContentInfo|null,
     *   rich_card?: RichCard|null,
     *   suggestions?: list<RcsSuggestion>|null,
     *   text?: string|null,
     * } $contentMessage
     */
    public function withContentMessage(
        ContentMessage|array $contentMessage
    ): self {
        $obj = clone $this;
        $obj['content_message'] = $contentMessage;

        return $obj;
    }

    /**
     * RCS Event to send to the recipient.
     *
     * @param Event|array{event_type?: value-of<EventType>|null} $event
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
        $obj['expire_time'] = $expireTime;

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
