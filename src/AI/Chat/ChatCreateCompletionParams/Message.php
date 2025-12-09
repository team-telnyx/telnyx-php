<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray\Type;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Role;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MessageShape = array{
 *   content: string|list<TextAndImageArray>, role: value-of<Role>
 * }
 */
final class Message implements BaseModel
{
    /** @use SdkModel<MessageShape> */
    use SdkModel;

    /** @var string|list<TextAndImageArray> $content */
    #[Required(union: Content::class)]
    public string|array $content;

    /** @var value-of<Role> $role */
    #[Required(enum: Role::class)]
    public string $role;

    /**
     * `new Message()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Message::with(content: ..., role: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Message)->withContent(...)->withRole(...)
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
     * @param string|list<TextAndImageArray|array{
     *   type: value-of<Type>, imageURL?: string|null, text?: string|null
     * }> $content
     * @param Role|value-of<Role> $role
     */
    public static function with(string|array $content, Role|string $role): self
    {
        $self = new self;

        $self['content'] = $content;
        $self['role'] = $role;

        return $self;
    }

    /**
     * @param string|list<TextAndImageArray|array{
     *   type: value-of<Type>, imageURL?: string|null, text?: string|null
     * }> $content
     */
    public function withContent(string|array $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }
}
