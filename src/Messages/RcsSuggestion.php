<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsSuggestion\Action;
use Telnyx\Messages\RcsSuggestion\Reply;

/**
 * @phpstan-import-type ActionShape from \Telnyx\Messages\RcsSuggestion\Action
 * @phpstan-import-type ReplyShape from \Telnyx\Messages\RcsSuggestion\Reply
 *
 * @phpstan-type RcsSuggestionShape = array{
 *   action?: null|Action|ActionShape, reply?: null|Reply|ReplyShape
 * }
 */
final class RcsSuggestion implements BaseModel
{
    /** @use SdkModel<RcsSuggestionShape> */
    use SdkModel;

    /**
     * When tapped, initiates the corresponding native action on the device.
     */
    #[Optional]
    public ?Action $action;

    #[Optional]
    public ?Reply $reply;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActionShape $action
     * @param ReplyShape $reply
     */
    public static function with(
        Action|array|null $action = null,
        Reply|array|null $reply = null
    ): self {
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $reply && $self['reply'] = $reply;

        return $self;
    }

    /**
     * When tapped, initiates the corresponding native action on the device.
     *
     * @param ActionShape $action
     */
    public function withAction(Action|array $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * @param ReplyShape $reply
     */
    public function withReply(Reply|array $reply): self
    {
        $self = clone $this;
        $self['reply'] = $reply;

        return $self;
    }
}
