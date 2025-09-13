<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type conversation_get_response = array{data?: Conversation}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ConversationGetResponse implements BaseModel
{
    /** @use SdkModel<conversation_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Conversation $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Conversation $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(Conversation $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
