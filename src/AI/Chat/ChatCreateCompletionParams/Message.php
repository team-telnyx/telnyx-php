<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Role;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type message_alias = array{
 *   content: string|list<TextAndImageArray>, role: value-of<Role>
 * }
 */
final class Message implements BaseModel
{
    /** @use SdkModel<message_alias> */
    use SdkModel;

    /** @var string|list<TextAndImageArray> $content */
    #[Api(union: Content::class)]
    public string|array $content;

    /** @var value-of<Role> $role */
    #[Api(enum: Role::class)]
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
     * @param string|list<TextAndImageArray> $content
     * @param Role|value-of<Role> $role
     */
    public static function with(string|array $content, Role|string $role): self
    {
        $obj = new self;

        $obj->content = $content;
        $obj->role = $role instanceof Role ? $role->value : $role;

        return $obj;
    }

    /**
     * @param string|list<TextAndImageArray> $content
     */
    public function withContent(string|array $content): self
    {
        $obj = clone $this;
        $obj->content = $content;

        return $obj;
    }

    /**
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $obj = clone $this;
        $obj->role = $role instanceof Role ? $role->value : $role;

        return $obj;
    }
}
