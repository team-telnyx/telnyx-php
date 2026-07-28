<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailMessages\EmailMessageBatchParams\Message;

/**
 * Creates up to 50 email messages in a single request.
 *
 * @see Telnyx\Services\EmailMessagesService::batch()
 *
 * @phpstan-import-type MessageShape from \Telnyx\EmailMessages\EmailMessageBatchParams\Message
 *
 * @phpstan-type EmailMessageBatchParamsShape = array{
 *   messages: list<Message|MessageShape>,
 *   sandboxMode?: bool|null,
 *   idempotencyKey?: string|null,
 * }
 */
final class EmailMessageBatchParams implements BaseModel
{
    /** @use SdkModel<EmailMessageBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<Message> $messages */
    #[Required(list: Message::class)]
    public array $messages;

    /**
     * Applies sandbox mode to all messages in the batch. Overrides any per-message sandbox_mode in the messages array.
     */
    #[Optional('sandbox_mode')]
    public ?bool $sandboxMode;

    #[Optional]
    public ?string $idempotencyKey;

    /**
     * `new EmailMessageBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailMessageBatchParams::with(messages: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailMessageBatchParams)->withMessages(...)
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
     * @param list<Message|MessageShape> $messages
     */
    public static function with(
        array $messages,
        ?bool $sandboxMode = null,
        ?string $idempotencyKey = null
    ): self {
        $self = new self;

        $self['messages'] = $messages;

        null !== $sandboxMode && $self['sandboxMode'] = $sandboxMode;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * @param list<Message|MessageShape> $messages
     */
    public function withMessages(array $messages): self
    {
        $self = clone $this;
        $self['messages'] = $messages;

        return $self;
    }

    /**
     * Applies sandbox mode to all messages in the batch. Overrides any per-message sandbox_mode in the messages array.
     */
    public function withSandboxMode(bool $sandboxMode): self
    {
        $self = clone $this;
        $self['sandboxMode'] = $sandboxMode;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
