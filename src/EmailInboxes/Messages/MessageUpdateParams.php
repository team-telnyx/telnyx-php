<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates the explicit read state of an account-scoped inbound message. Set `read_at`
 * to `true` to mark the message read at the server's current time, to an ISO 8601
 * timestamp to use that timestamp, or to `null` to mark the message unread. Repeating
 * the same update is idempotent.
 *
 * @see Telnyx\Services\EmailInboxes\MessagesService::update()
 *
 * @phpstan-import-type ReadAtVariants from \Telnyx\EmailInboxes\Messages\MessageUpdateParams\ReadAt
 * @phpstan-import-type ReadAtShape from \Telnyx\EmailInboxes\Messages\MessageUpdateParams\ReadAt
 *
 * @phpstan-type MessageUpdateParamsShape = array{
 *   inboxID: string, readAt: ReadAtShape
 * }
 */
final class MessageUpdateParams implements BaseModel
{
    /** @use SdkModel<MessageUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $inboxID;

    /**
     * Set to `true` for server time, an ISO 8601 timestamp for an explicit read time, or `null` to mark unread.
     *
     * @var ReadAtVariants $readAt
     */
    #[Required('read_at')]
    public bool|\DateTimeInterface|null $readAt;

    /**
     * `new MessageUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageUpdateParams::with(inboxID: ..., readAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageUpdateParams)->withInboxID(...)->withReadAt(...)
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
     * @param ReadAtShape $readAt
     */
    public static function with(
        string $inboxID,
        bool|\DateTimeInterface|null $readAt
    ): self {
        $self = new self;

        $self['inboxID'] = $inboxID;
        $self['readAt'] = $readAt;

        return $self;
    }

    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    /**
     * Set to `true` for server time, an ISO 8601 timestamp for an explicit read time, or `null` to mark unread.
     *
     * @param ReadAtShape $readAt
     */
    public function withReadAt(bool|\DateTimeInterface|null $readAt): self
    {
        $self = clone $this;
        $self['readAt'] = $readAt;

        return $self;
    }
}
