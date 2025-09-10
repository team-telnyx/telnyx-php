<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type text_and_image_array = array{
 *   type: value-of<Type>, imageURL?: string|null, text?: string|null
 * }
 */
final class TextAndImageArray implements BaseModel
{
    /** @use SdkModel<text_and_image_array> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api('image_url', optional: true)]
    public ?string $imageURL;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->type = $type instanceof Type ? $type->value : $type;

        null !== $imageURL && $obj->imageURL = $imageURL;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withImageURL(string $imageURL): self
    {
        $obj = clone $this;
        $obj->imageURL = $imageURL;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
