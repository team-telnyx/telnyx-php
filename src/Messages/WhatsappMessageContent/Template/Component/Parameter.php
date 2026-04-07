<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappMessageContent\Template\Component;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\WhatsappMessageContent\Template\Component\Parameter\Type;

/**
 * @phpstan-type ParameterShape = array{
 *   text?: string|null,
 *   type?: null|\Telnyx\Messages\WhatsappMessageContent\Template\Component\Parameter\Type|value-of<\Telnyx\Messages\WhatsappMessageContent\Template\Component\Parameter\Type>,
 * }
 */
final class Parameter implements BaseModel
{
    /** @use SdkModel<ParameterShape> */
    use SdkModel;

    #[Optional]
    public ?string $text;

    /**
     * @var value-of<Type>|null $type
     */
    #[Optional(
        enum: Type::class,
    )]
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
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $text = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $text && $self['text'] = $text;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(
        Type|string $type,
    ): self {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
