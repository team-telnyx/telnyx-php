<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sends a chat message into a meeting session.
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
     * Chat message text to send in the meeting.
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
     * Chat message text to send in the meeting.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
