<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams;

use Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Use this is you want to guarantee a JSON output without defining a schema. For control over the schema, use `guided_json`.
 *
 * @phpstan-type ResponseFormatShape = array{type: Type|value-of<Type>}
 */
final class ResponseFormat implements BaseModel
{
    /** @use SdkModel<ResponseFormatShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new ResponseFormat()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResponseFormat::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResponseFormat)->withType(...)
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
    public static function with(Type|string $type): self
    {
        $self = new self;

        $self['type'] = $type;

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
