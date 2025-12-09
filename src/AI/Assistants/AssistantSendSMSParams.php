<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantSendSMSParams\ConversationMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Send an SMS message for an assistant. This endpoint:
 * 1. Validates the assistant exists and has messaging profile configured
 * 2. If should_create_conversation is true, creates a new conversation with metadata
 * 3. Sends the SMS message (If `text` is set, this will be sent. Otherwise, if this is the first message in the conversation and the assistant has a `greeting` configured, this will be sent. Otherwise the assistant will generate the text to send.)
 * 4. Updates conversation metadata if provided
 * 5. Returns the conversation ID
 *
 * @see Telnyx\Services\AI\AssistantsService::sendSMS()
 *
 * @phpstan-type AssistantSendSMSParamsShape = array{
 *   from: string,
 *   text: string,
 *   to: string,
 *   conversationMetadata?: array<string,string|int|bool>,
 *   shouldCreateConversation?: bool,
 * }
 */
final class AssistantSendSMSParams implements BaseModel
{
    /** @use SdkModel<AssistantSendSMSParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $from;

    #[Required]
    public string $text;

    #[Required]
    public string $to;

    /** @var array<string,string|int|bool>|null $conversationMetadata */
    #[Optional('conversation_metadata', map: ConversationMetadata::class)]
    public ?array $conversationMetadata;

    #[Optional('should_create_conversation')]
    public ?bool $shouldCreateConversation;

    /**
     * `new AssistantSendSMSParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantSendSMSParams::with(from: ..., text: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantSendSMSParams)->withFrom(...)->withText(...)->withTo(...)
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
     *
     * @param array<string,string|int|bool> $conversationMetadata
     */
    public static function with(
        string $from,
        string $text,
        string $to,
        ?array $conversationMetadata = null,
        ?bool $shouldCreateConversation = null,
    ): self {
        $obj = new self;

        $obj['from'] = $from;
        $obj['text'] = $text;
        $obj['to'] = $to;

        null !== $conversationMetadata && $obj['conversationMetadata'] = $conversationMetadata;
        null !== $shouldCreateConversation && $obj['shouldCreateConversation'] = $shouldCreateConversation;

        return $obj;
    }

    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }

    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * @param array<string,string|int|bool> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $obj = clone $this;
        $obj['conversationMetadata'] = $conversationMetadata;

        return $obj;
    }

    public function withShouldCreateConversation(
        bool $shouldCreateConversation
    ): self {
        $obj = clone $this;
        $obj['shouldCreateConversation'] = $shouldCreateConversation;

        return $obj;
    }
}
