<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TextAndImageArrayShape = array{
 *   type: Type|value-of<Type>, imageURL?: string|null, text?: string|null
 * }
 */
final class TextAndImageArray implements BaseModel
{
    /** @use SdkModel<TextAndImageArrayShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional('image_url')]
    public ?string $imageURL;

    #[Optional]
    public ?string $text;

    /**
     * `new TextAndImageArray()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TextAndImageArray::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TextAndImageArray)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Type|string $type,
        ?string $imageURL = null,
        ?string $text = null
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $imageURL && $self['imageURL'] = $imageURL;
        null !== $text && $self['text'] = $text;

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

    public function withImageURL(string $imageURL): self
    {
        $self = clone $this;
        $self['imageURL'] = $imageURL;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
