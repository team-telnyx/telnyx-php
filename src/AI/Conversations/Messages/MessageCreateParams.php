<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages;

use Telnyx\AI\Conversations\Messages\MessageCreateParams\Metadata;
use Telnyx\AI\Conversations\Messages\MessageCreateParams\ToolChoice;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MessageCreateParams); // set properties as needed
 * $client->ai.conversations.messages->create(...$params->toArray());
 * ```
 * Add a new message to the conversation. Used to insert a new messages to a conversation manually ( without using chat endpoint ).
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.conversations.messages->create(...$params->toArray());`
 *
 * @see Telnyx\AI\Conversations\Messages->create
 *
 * @phpstan-type message_create_params = array{
 *   role: string,
 *   content?: string,
 *   metadata?: array<string, string|int|bool|list<string|int|bool>>,
 *   name?: string,
 *   sentAt?: \DateTimeInterface,
 *   toolCallID?: string,
 *   toolCalls?: list<array<string, mixed>>,
 *   toolChoice?: mixed|string,
 * }
 */
final class MessageCreateParams implements BaseModel
{
    /** @use SdkModel<message_create_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $role;

    #[Api(optional: true)]
    public ?string $content;

    /** @var array<string, string|int|bool|list<string|int|bool>>|null $metadata */
    #[Api(map: Metadata::class, optional: true)]
    public ?array $metadata;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('sent_at', optional: true)]
    public ?\DateTimeInterface $sentAt;

    #[Api('tool_call_id', optional: true)]
    public ?string $toolCallID;

    /** @var list<array<string, mixed>>|null $toolCalls */
    #[Api('tool_calls', list: new MapOf('mixed'), optional: true)]
    public ?array $toolCalls;

    /** @var mixed|string|null $toolChoice */
    #[Api('tool_choice', union: ToolChoice::class, optional: true)]
    public mixed $toolChoice;

    /**
     * `new MessageCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessageCreateParams::with(role: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessageCreateParams)->withRole(...)
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
     * @param array<string, string|int|bool|list<string|int|bool>> $metadata
     * @param list<array<string, mixed>> $toolCalls
     * @param mixed|string $toolChoice
     */
    public static function with(
        string $role,
        ?string $content = null,
        ?array $metadata = null,
        ?string $name = null,
        ?\DateTimeInterface $sentAt = null,
        ?string $toolCallID = null,
        ?array $toolCalls = null,
        mixed $toolChoice = null,
    ): self {
        $obj = new self;

        $obj->role = $role;

        null !== $content && $obj->content = $content;
        null !== $metadata && $obj->metadata = $metadata;
        null !== $name && $obj->name = $name;
        null !== $sentAt && $obj->sentAt = $sentAt;
        null !== $toolCallID && $obj->toolCallID = $toolCallID;
        null !== $toolCalls && $obj->toolCalls = $toolCalls;
        null !== $toolChoice && $obj->toolChoice = $toolChoice;

        return $obj;
    }

    public function withRole(string $role): self
    {
        $obj = clone $this;
        $obj->role = $role;

        return $obj;
    }

    public function withContent(string $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * @param array<string, string|int|bool|list<string|int|bool>> $metadata
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

    public function withSentAt(\DateTimeInterface $sentAt): self
    {
        $obj = clone $this;
        $obj->sentAt = $sentAt;

        return $obj;
    }

    public function withToolCallID(string $toolCallID): self
    {
        $obj = clone $this;
        $obj->toolCallID = $toolCallID;

        return $obj;
    }

    /**
     * @param list<array<string, mixed>> $toolCalls
     */
    public function withToolCalls(array $toolCalls): self
    {
        $obj = clone $this;
        $obj->toolCalls = $toolCalls;

        return $obj;
    }

    /**
     * @param mixed|string $toolChoice
     */
    public function withToolChoice(mixed $toolChoice): self
    {
        $obj = clone $this;
        $obj->toolChoice = $toolChoice;

        return $obj;
    }
}
