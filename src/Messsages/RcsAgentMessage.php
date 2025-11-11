<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage;
use Telnyx\Messsages\RcsAgentMessage\Event;

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

    #[Api(optional: true)]
    public ?ContentMessage $content_message;

    /**
     * RCS Event to send to the recipient.
     */
    #[Api(optional: true)]
    public ?Event $event;

    /**
     * Timestamp in UTC of when this message is considered expired.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expire_time;

    /**
     * Duration in seconds ending with 's'.
     */
    #[Api(optional: true)]
    public ?string $ttl;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?ContentMessage $content_message = null,
        ?Event $event = null,
        ?\DateTimeInterface $expire_time = null,
        ?string $ttl = null,
    ): self {
        $obj = new self;

        null !== $content_message && $obj->content_message = $content_message;
        null !== $event && $obj->event = $event;
        null !== $expire_time && $obj->expire_time = $expire_time;
        null !== $ttl && $obj->ttl = $ttl;

        return $obj;
    }

    public function withContentMessage(ContentMessage $contentMessage): self
    {
        $obj = clone $this;
        $obj->content_message = $contentMessage;

        return $obj;
    }

    /**
     * RCS Event to send to the recipient.
     */
    public function withEvent(Event $event): self
    {
        $obj = clone $this;
        $obj->event = $event;

        return $obj;
    }

    /**
     * Timestamp in UTC of when this message is considered expired.
     */
    public function withExpireTime(\DateTimeInterface $expireTime): self
    {
        $obj = clone $this;
        $obj->expire_time = $expireTime;

        return $obj;
    }

    /**
     * Duration in seconds ending with 's'.
     */
    public function withTtl(string $ttl): self
    {
        $obj = clone $this;
        $obj->ttl = $ttl;

        return $obj;
    }
}
