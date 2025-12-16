<?php

declare(strict_types=1);

namespace Telnyx\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsSuggestion\Action;
use Telnyx\Messages\RcsSuggestion\Action\CreateCalendarEventAction;
use Telnyx\Messages\RcsSuggestion\Action\DialAction;
use Telnyx\Messages\RcsSuggestion\Action\OpenURLAction;
use Telnyx\Messages\RcsSuggestion\Action\ViewLocationAction;
use Telnyx\Messages\RcsSuggestion\Reply;

/**
 * @phpstan-type RcsSuggestionShape = array{
 *   action?: Action|null, reply?: Reply|null
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
     * @param Action|array{
     *   createCalendarEventAction?: CreateCalendarEventAction|null,
     *   dialAction?: DialAction|null,
     *   fallbackURL?: string|null,
     *   openURLAction?: OpenURLAction|null,
     *   postbackData?: string|null,
     *   shareLocationAction?: array<string,mixed>|null,
     *   text?: string|null,
     *   viewLocationAction?: ViewLocationAction|null,
     * } $action
     * @param Reply|array{postbackData?: string|null, text?: string|null} $reply
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
     * @param Action|array{
     *   createCalendarEventAction?: CreateCalendarEventAction|null,
     *   dialAction?: DialAction|null,
     *   fallbackURL?: string|null,
     *   openURLAction?: OpenURLAction|null,
     *   postbackData?: string|null,
     *   shareLocationAction?: array<string,mixed>|null,
     *   text?: string|null,
     *   viewLocationAction?: ViewLocationAction|null,
     * } $action
     */
    public function withAction(Action|array $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * @param Reply|array{postbackData?: string|null, text?: string|null} $reply
     */
    public function withReply(Reply|array $reply): self
    {
        $self = clone $this;
        $self['reply'] = $reply;

        return $self;
    }
}
