<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Role;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ContentVariants from \Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content
 * @phpstan-import-type ContentShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content
 *
 * @phpstan-type MessageShape = array{
 *   content: ContentShape, role: Role|value-of<Role>
 * }
 */
final class Message implements BaseModel
{
    /** @use SdkModel<MessageShape> */
    use SdkModel;

    /** @var ContentVariants $content */
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
     * @param ContentShape $content
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
     * @param ContentShape $content
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
