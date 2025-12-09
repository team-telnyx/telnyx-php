<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   lastMessageAt: \DateTimeInterface,
 *   metadata: array<string,string>,
 *   name?: string|null,
 * }
 */
final class Conversation implements BaseModel
{
    /** @use SdkModel<ConversationShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * The datetime the conversation was created.
     */
    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The datetime of the latest message in the conversation.
     */
    #[Required('last_message_at')]
    public \DateTimeInterface $lastMessageAt;

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @var array<string,string> $metadata
     */
    #[Required(map: 'string')]
    public array $metadata;

    #[Optional]
    public ?string $name;

    /**
     * `new Conversation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Conversation::with(id: ..., createdAt: ..., lastMessageAt: ..., metadata: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Conversation)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withLastMessageAt(...)
     *   ->withMetadata(...)
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
     * @param array<string,string> $metadata
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $lastMessageAt,
        array $metadata,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['lastMessageAt'] = $lastMessageAt;
        $obj['metadata'] = $metadata;

        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The datetime the conversation was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The datetime of the latest message in the conversation.
     */
    public function withLastMessageAt(\DateTimeInterface $lastMessageAt): self
    {
        $obj = clone $this;
        $obj['lastMessageAt'] = $lastMessageAt;

        return $obj;
    }

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @param array<string,string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
