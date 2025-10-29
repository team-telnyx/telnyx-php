<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrdersExceptionType\Code;

/**
 * @phpstan-type PortingOrdersExceptionTypeShape = array{
 *   code?: value-of<Code>, description?: string
 * }
 */
final class PortingOrdersExceptionType implements BaseModel
{
    /** @use SdkModel<PortingOrdersExceptionTypeShape> */
    use SdkModel;

    /**
     * Identifier of an exception type.
     *
     * @var value-of<Code>|null $code
     */
    #[Api(enum: Code::class, optional: true)]
    public ?string $code;

    /**
     * Description of an exception type.
     */
    #[Api(optional: true)]
    public ?string $description;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Code|value-of<Code> $code
     */
    public static function with(
        Code|string|null $code = null,
        ?string $description = null
    ): self {
        $obj = new self;

        null !== $code && $obj['code'] = $code;
        null !== $description && $obj->description = $description;

        return $obj;
    }

    /**
     * Identifier of an exception type.
     *
     * @param Code|value-of<Code> $code
     */
    public function withCode(Code|string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * Description of an exception type.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }
}
