<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update metadata for a specific conversation.
 *
 * @see Telnyx\AI\Conversations->update
 *
 * @phpstan-type ConversationUpdateParamsShape = array{
 *   metadata?: array<string, string>
 * }
 */
final class ConversationUpdateParams implements BaseModel
{
    /** @use SdkModel<ConversationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Metadata associated with the conversation.
     *
     * @var array<string, string>|null $metadata
     */
    #[Api(map: 'string', optional: true)]
    public ?array $metadata;

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
    public static function with(?array $metadata = null): self
    {
        $obj = new self;

        null !== $metadata && $obj->metadata = $metadata;

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
}
