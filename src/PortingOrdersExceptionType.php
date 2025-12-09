<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrdersExceptionType\Code;

/**
 * @phpstan-type PortingOrdersExceptionTypeShape = array{
 *   code?: value-of<Code>|null, description?: string|null
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
    #[Optional(enum: Code::class)]
    public ?string $code;

    /**
     * Description of an exception type.
     */
    #[Optional]
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
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $description && $self['description'] = $description;

        return $self;
    }

    /**
     * Identifier of an exception type.
     *
     * @param Code|value-of<Code> $code
     */
    public function withCode(Code|string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Description of an exception type.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
