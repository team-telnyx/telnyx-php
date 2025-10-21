<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new AI Conversation.
 *
 * @see Telnyx\AI\Conversations->create
 *
 * @phpstan-type conversation_create_params = array{
 *   metadata?: array<string, string>, name?: string
 * }
 */
final class ConversationCreateParams implements BaseModel
{
    /** @use SdkModel<conversation_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Metadata associated with the conversation.
     *
     * @var array<string, string>|null $metadata
     */
    #[Api(map: 'string', optional: true)]
    public ?array $metadata;

    #[Api(optional: true)]
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
     * @param array<string, string> $metadata
     */
    public static function with(
        ?array $metadata = null,
        ?string $name = null
    ): self {
        $obj = new self;

        null !== $metadata && $obj->metadata = $metadata;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * Metadata associated with the conversation.
     *
     * @param array<string, string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
