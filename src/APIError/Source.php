<?php

declare(strict_types=1);

namespace Telnyx\APIError;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SourceShape = array{
 *   parameter?: string|null, pointer?: string|null
 * }
 */
final class Source implements BaseModel
{
    /** @use SdkModel<SourceShape> */
    use SdkModel;

    /**
     * Indicates which query parameter caused the error.
     */
    #[Api(optional: true)]
    public ?string $parameter;

    /**
     * JSON pointer (RFC6901) to the offending entity.
     */
    #[Api(optional: true)]
    public ?string $pointer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $parameter = null,
        ?string $pointer = null
    ): self {
        $obj = new self;

        null !== $parameter && $obj->parameter = $parameter;
        null !== $pointer && $obj->pointer = $pointer;

        return $obj;
    }

    /**
     * Indicates which query parameter caused the error.
     */
    public function withParameter(string $parameter): self
    {
        $obj = clone $this;
        $obj->parameter = $parameter;

        return $obj;
    }

    /**
     * JSON pointer (RFC6901) to the offending entity.
     */
    public function withPointer(string $pointer): self
    {
        $obj = clone $this;
        $obj->pointer = $pointer;

        return $obj;
    }
}
