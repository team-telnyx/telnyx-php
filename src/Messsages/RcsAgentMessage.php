<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage;
use Telnyx\Messsages\RcsAgentMessage\Event;

/**
 * @phpstan-type rcs_agent_message = array{
 *   contentMessage?: ContentMessage,
 *   event?: Event,
 *   expireTime?: \DateTimeInterface,
 *   ttl?: string,
 * }
 */
final class RcsAgentMessage implements BaseModel
{
    /** @use SdkModel<rcs_agent_message> */
    use SdkModel;

    #[Api('content_message', optional: true)]
    public ?ContentMessage $contentMessage;

    /**
     * RCS Event to send to the recipient.
     */
    #[Api(optional: true)]
    public ?Event $event;

    /**
     * Timestamp in UTC of when this message is considered expired.
     */
    #[Api('expire_time', optional: true)]
    public ?\DateTimeInterface $expireTime;

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
        ?ContentMessage $contentMessage = null,
        ?Event $event = null,
        ?\DateTimeInterface $expireTime = null,
        ?string $ttl = null,
    ): self {
        $obj = new self;

        null !== $contentMessage && $obj->contentMessage = $contentMessage;
        null !== $event && $obj->event = $event;
        null !== $expireTime && $obj->expireTime = $expireTime;
        null !== $ttl && $obj->ttl = $ttl;

        return $obj;
    }

    public function withContentMessage(ContentMessage $contentMessage): self
    {
        $obj = clone $this;
        $obj->contentMessage = $contentMessage;

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
        $obj->expireTime = $expireTime;

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
