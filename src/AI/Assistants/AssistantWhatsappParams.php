<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AssistantWhatsappParams\ConversationMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Start a WhatsApp conversation with a customer from the business side. This endpoint:
 * 1. Validates that `from` is a WhatsApp number on your account whose messaging profile has this assistant configured
 * 2. Creates a new `whatsapp_chat` conversation with the provided metadata
 * 3. Asks the assistant to pick one of its approved WhatsApp templates and fill its variables from `content`
 * 4. Sends the template from `from` to `to`
 * 5. Returns the conversation ID and the message ID
 *
 * When the customer replies, the reply is routed to the same conversation and the assistant answers within the 24-hour customer service window. The assistant needs a `whatsapp_template` tool with at least one approved template, data retention enabled and PII redaction disabled.
 *
 * @see Telnyx\Services\AI\AssistantsService::whatsapp()
 *
 * @phpstan-import-type ConversationMetadataVariants from \Telnyx\AI\Assistants\AssistantWhatsappParams\ConversationMetadata
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\AssistantWhatsappParams\ConversationMetadata
 *
 * @phpstan-type AssistantWhatsappParamsShape = array{
 *   content: string,
 *   from: string,
 *   to: string,
 *   conversationMetadata?: array<string,ConversationMetadataShape>|null,
 *   idempotencyKey?: string|null,
 * }
 */
final class AssistantWhatsappParams implements BaseModel
{
    /** @use SdkModel<AssistantWhatsappParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Instruction for the assistant, including the values for the template variables, e.g. `Send the login verification code 482913 to the customer.`.
     */
    #[Required]
    public string $content;

    /**
     * WhatsApp number on your account to send from, in E.164 format. Its messaging profile must have this assistant configured.
     */
    #[Required]
    public string $from;

    /**
     * Customer to message, as an E.164 phone number or a WhatsApp business-scoped user ID (BSUID).
     */
    #[Required]
    public string $to;

    /**
     * Metadata stored on the conversation. Keys starting with `telnyx_` and the `assistant_id` key are reserved.
     *
     * @var array<string,ConversationMetadataVariants>|null $conversationMetadata
     */
    #[Optional('conversation_metadata', map: ConversationMetadata::class)]
    public ?array $conversationMetadata;

    #[Optional]
    public ?string $idempotencyKey;

    /**
     * `new AssistantWhatsappParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantWhatsappParams::with(content: ..., from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantWhatsappParams)->withContent(...)->withFrom(...)->withTo(...)
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
     * @param array<string,ConversationMetadataShape>|null $conversationMetadata
     */
    public static function with(
        string $content,
        string $from,
        string $to,
        ?array $conversationMetadata = null,
        ?string $idempotencyKey = null,
    ): self {
        $self = new self;

        $self['content'] = $content;
        $self['from'] = $from;
        $self['to'] = $to;

        null !== $conversationMetadata && $self['conversationMetadata'] = $conversationMetadata;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * Instruction for the assistant, including the values for the template variables, e.g. `Send the login verification code 482913 to the customer.`.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * WhatsApp number on your account to send from, in E.164 format. Its messaging profile must have this assistant configured.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Customer to message, as an E.164 phone number or a WhatsApp business-scoped user ID (BSUID).
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * Metadata stored on the conversation. Keys starting with `telnyx_` and the `assistant_id` key are reserved.
     *
     * @param array<string,ConversationMetadataShape> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $self = clone $this;
        $self['conversationMetadata'] = $conversationMetadata;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
