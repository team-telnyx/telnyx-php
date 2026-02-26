<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappInteractive\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\WhatsappInteractive\Action\Button\Reply;
use Telnyx\Messages\WhatsappInteractive\Action\Button\Type;

/**
 * @phpstan-import-type ReplyShape from \Telnyx\Messages\WhatsappInteractive\Action\Button\Reply
 *
 * @phpstan-type ButtonShape = array{
 *   reply?: null|Reply|ReplyShape, type?: null|Type|value-of<Type>
 * }
 */
final class Button implements BaseModel
{
    /** @use SdkModel<ButtonShape> */
    use SdkModel;

    #[Optional]
    public ?Reply $reply;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Reply|ReplyShape|null $reply
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        Reply|array|null $reply = null,
        Type|string|null $type = null
    ): self {
        $self = new self;

        null !== $reply && $self['reply'] = $reply;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * @param Reply|ReplyShape $reply
     */
    public function withReply(Reply|array $reply): self
    {
        $self = clone $this;
        $self['reply'] = $reply;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
