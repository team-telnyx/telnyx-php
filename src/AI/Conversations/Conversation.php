<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type conversation_alias = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   lastMessageAt: \DateTimeInterface,
 *   metadata: array<string, string>,
 *   name?: string,
 * }
 */
final class Conversation implements BaseModel, ResponseConverter
{
    /** @use SdkModel<conversation_alias> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    /**
     * The datetime the conversation was created.
     */
    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * The datetime of the latest message in the conversation.
     */
    #[Api('last_message_at')]
    public \DateTimeInterface $lastMessageAt;

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @var array<string, string> $metadata
     */
    #[Api(map: 'string')]
    public array $metadata;

    #[Api(optional: true)]
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
     * @param array<string, string> $metadata
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $lastMessageAt,
        array $metadata,
        ?string $name = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->lastMessageAt = $lastMessageAt;
        $obj->metadata = $metadata;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The datetime the conversation was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The datetime of the latest message in the conversation.
     */
    public function withLastMessageAt(\DateTimeInterface $lastMessageAt): self
    {
        $obj = clone $this;
        $obj->lastMessageAt = $lastMessageAt;

        return $obj;
    }

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @param array<string, string> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $obj = clone $this;
        $obj->metadata = $metadata;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
