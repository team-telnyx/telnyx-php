<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConversationShape from \Telnyx\AI\Conversations\Conversation
 *
 * @phpstan-type ConversationGetResponseShape = array{
 *   data?: null|Conversation|ConversationShape
 * }
 */
final class ConversationGetResponse implements BaseModel
{
    /** @use SdkModel<ConversationGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Conversation $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Conversation|ConversationShape|null $data
     */
    public static function with(Conversation|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Conversation|ConversationShape $data
     */
    public function withData(Conversation|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
