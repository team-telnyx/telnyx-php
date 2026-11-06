<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Send chat as the bot in an active meeting. Returns 202 with data.accepted=true. Google Meet and Teams confirm sending before success; 502 chat_not_sent means not sent, while chat_delivery_unknown means delivery may have occurred. Inspect chat and chat.sent events before retrying an uncertain send. Each request is a new message and is not idempotent. Google Meet and Teams allow at most 1000 chat requests per session, including an entrance message; exceeding this returns 409 invalid_state.
 *
 * @see Telnyx\Services\MeetingSessions\ActionsService::sendChat()
 *
 * @phpstan-type ActionSendChatParamsShape = array{text: string}
 */
final class ActionSendChatParams implements BaseModel
{
    /** @use SdkModel<ActionSendChatParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Message text, 1–4000 characters. On Google Meet and Teams, also at most 4096 UTF-8 bytes and nonblank; control characters other than tab and line breaks are rejected. CRLF is normalized to LF.
     */
    #[Required]
    public string $text;

    /**
     * `new ActionSendChatParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSendChatParams::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSendChatParams)->withText(...)
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
     */
    public static function with(string $text): self
    {
        $self = new self;

        $self['text'] = $text;

        return $self;
    }

    /**
     * Message text, 1–4000 characters. On Google Meet and Teams, also at most 4096 UTF-8 bytes and nonblank; control characters other than tab and line breaks are rejected. CRLF is normalized to LF.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
