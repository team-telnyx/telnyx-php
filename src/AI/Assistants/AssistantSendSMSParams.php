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
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\AssistantSendSMSParams\ConversationMetadata
 *
 * @phpstan-type AssistantSendSMSParamsShape = array{
 *   from: string,
 *   text: string,
 *   to: string,
 *   conversationMetadata?: array<string,ConversationMetadataShape>|null,
 *   shouldCreateConversation?: bool|null,
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
     * @param array<string,ConversationMetadataShape> $conversationMetadata
     */
    public static function with(
        string $from,
        string $text,
        string $to,
        ?array $conversationMetadata = null,
        ?bool $shouldCreateConversation = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['text'] = $text;
        $self['to'] = $to;

        null !== $conversationMetadata && $self['conversationMetadata'] = $conversationMetadata;
        null !== $shouldCreateConversation && $self['shouldCreateConversation'] = $shouldCreateConversation;

        return $self;
    }

    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param array<string,ConversationMetadataShape> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $self = clone $this;
        $self['conversationMetadata'] = $conversationMetadata;

        return $self;
    }

    public function withShouldCreateConversation(
        bool $shouldCreateConversation
    ): self {
        $self = clone $this;
        $self['shouldCreateConversation'] = $shouldCreateConversation;

        return $self;
    }
}
