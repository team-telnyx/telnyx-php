<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallControlCommandResultWithConversationIDShape from \Telnyx\Calls\Actions\CallControlCommandResultWithConversationID
 *
 * @phpstan-type ActionGatherUsingAIResponseShape = array{
 *   data?: null|CallControlCommandResultWithConversationID|CallControlCommandResultWithConversationIDShape,
 * }
 */
final class ActionGatherUsingAIResponse implements BaseModel
{
    /** @use SdkModel<ActionGatherUsingAIResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CallControlCommandResultWithConversationID $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallControlCommandResultWithConversationID|CallControlCommandResultWithConversationIDShape|null $data
     */
    public static function with(
        CallControlCommandResultWithConversationID|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallControlCommandResultWithConversationID|CallControlCommandResultWithConversationIDShape $data
     */
    public function withData(
        CallControlCommandResultWithConversationID|array $data
    ): self {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
