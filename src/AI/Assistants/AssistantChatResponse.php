<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type assistant_chat_response = array{content: string}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AssistantChatResponse implements BaseModel
{
    /** @use SdkModel<assistant_chat_response> */
    use SdkModel;

    /**
     * The assistant's generated response based on the input message and context.
     */
    #[Api]
    public string $content;

    /**
     * `new AssistantChatResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantChatResponse::with(content: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantChatResponse)->withContent(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $content): self
    {
        $obj = new self;

        $obj->content = $content;

        return $obj;
    }

    /**
     * The assistant's generated response based on the input message and context.
     */
    public function withContent(string $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }
}
