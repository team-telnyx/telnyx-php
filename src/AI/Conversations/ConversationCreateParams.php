<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new AI Conversation.
 *
 * @see Telnyx\Services\AI\ConversationsService::create()
 *
 * @phpstan-type ConversationCreateParamsShape = array{
 *   metadata?: array<string,string>|null, name?: string|null
 * }
 */
final class ConversationCreateParams implements BaseModel
{
    /** @use SdkModel<ConversationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Metadata associated with the conversation.
     *
     * @var array<string,string>|null $metadata
     */
    #[Optional(map: 'string')]
    public ?array $metadata;

    #[Optional]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,string>|null $metadata
     */
    public static function with(
        ?array $metadata = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $metadata && $self['metadata'] = $metadata;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Metadata associated with the conversation.
     *
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
