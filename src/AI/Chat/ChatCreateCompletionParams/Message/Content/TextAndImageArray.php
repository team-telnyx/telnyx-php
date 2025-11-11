<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Content\TextAndImageArray\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TextAndImageArrayShape = array{
 *   type: value-of<Type>, image_url?: string|null, text?: string|null
 * }
 */
final class TextAndImageArray implements BaseModel
{
    /** @use SdkModel<TextAndImageArrayShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $image_url;

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
        ?string $image_url = null,
        ?string $text = null
    ): self {
        $obj = new self;

        $obj['type'] = $type;

        null !== $image_url && $obj->image_url = $image_url;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withImageURL(string $imageURL): self
    {
        $obj = clone $this;
        $obj->image_url = $imageURL;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
