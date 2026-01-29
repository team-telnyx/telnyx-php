<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\JobError;

use Telnyx\Core\Attributes\Optional;
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
    #[Optional]
    public ?string $parameter;

    /**
     * JSON pointer (RFC6901) to the offending entity.
     */
    #[Optional]
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
        $self = new self;

        null !== $parameter && $self['parameter'] = $parameter;
        null !== $pointer && $self['pointer'] = $pointer;

        return $self;
    }

    /**
     * Indicates which query parameter caused the error.
     */
    public function withParameter(string $parameter): self
    {
        $self = clone $this;
        $self['parameter'] = $parameter;

        return $self;
    }

    /**
     * JSON pointer (RFC6901) to the offending entity.
     */
    public function withPointer(string $pointer): self
    {
        $self = clone $this;
        $self['pointer'] = $pointer;

        return $self;
    }
}
