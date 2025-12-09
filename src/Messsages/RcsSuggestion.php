<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsSuggestion\Action;
use Telnyx\Messsages\RcsSuggestion\Action\CreateCalendarEventAction;
use Telnyx\Messsages\RcsSuggestion\Action\DialAction;
use Telnyx\Messsages\RcsSuggestion\Action\OpenURLAction;
use Telnyx\Messsages\RcsSuggestion\Action\ViewLocationAction;
use Telnyx\Messsages\RcsSuggestion\Reply;

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
     *   shareLocationAction?: mixed,
     *   text?: string|null,
     *   viewLocationAction?: ViewLocationAction|null,
     * } $action
     * @param Reply|array{postbackData?: string|null, text?: string|null} $reply
     */
    public static function with(
        Action|array|null $action = null,
        Reply|array|null $reply = null
    ): self {
        $obj = new self;

        null !== $action && $obj['action'] = $action;
        null !== $reply && $obj['reply'] = $reply;

        return $obj;
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
     *   shareLocationAction?: mixed,
     *   text?: string|null,
     *   viewLocationAction?: ViewLocationAction|null,
     * } $action
     */
    public function withAction(Action|array $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * @param Reply|array{postbackData?: string|null, text?: string|null} $reply
     */
    public function withReply(Reply|array $reply): self
    {
        $obj = clone $this;
        $obj['reply'] = $reply;

        return $obj;
    }
}
