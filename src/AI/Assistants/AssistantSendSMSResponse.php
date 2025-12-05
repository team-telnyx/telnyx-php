<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AssistantSendSMSResponseShape = array{
 *   conversation_id?: string|null
 * }
 */
final class AssistantSendSMSResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AssistantSendSMSResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $conversation_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $conversation_id = null): self
    {
        $obj = new self;

        null !== $conversation_id && $obj['conversation_id'] = $conversation_id;

        return $obj;
    }

    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj['conversation_id'] = $conversationID;

        return $obj;
    }
}
