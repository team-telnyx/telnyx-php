<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsSuggestion\Action;
use Telnyx\Messsages\RcsSuggestion\Reply;

/**
 * @phpstan-type rcs_suggestion = array{action?: Action, reply?: Reply}
 */
final class RcsSuggestion implements BaseModel
{
    /** @use SdkModel<rcs_suggestion> */
    use SdkModel;

    /**
     * When tapped, initiates the corresponding native action on the device.
     */
    #[Api(optional: true)]
    public ?Action $action;

    #[Api(optional: true)]
    public ?Reply $reply;

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
        ?Action $action = null,
        ?Reply $reply = null
    ): self {
        $obj = new self;

        null !== $action && $obj->action = $action;
        null !== $reply && $obj->reply = $reply;

        return $obj;
    }

    /**
     * When tapped, initiates the corresponding native action on the device.
     */
    public function withAction(Action $action): self
    {
        $obj = clone $this;
        $obj->action = $action;

        return $obj;
    }

    public function withReply(Reply $reply): self
    {
        $obj = clone $this;
        $obj->reply = $reply;

        return $obj;
    }
}
