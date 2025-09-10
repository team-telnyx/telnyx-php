<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ConversationUpdateParams); // set properties as needed
 * $client->ai.conversations->update(...$params->toArray());
 * ```
 * Update metadata for a specific conversation.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.conversations->update(...$params->toArray());`
 *
 * @see Telnyx\AI\Conversations->update
 *
 * @phpstan-type conversation_update_params = array{
 *   metadata?: array<string, string>
 * }
 */
final class ConversationUpdateParams implements BaseModel
{
    /** @use SdkModel<conversation_update_params> */
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
