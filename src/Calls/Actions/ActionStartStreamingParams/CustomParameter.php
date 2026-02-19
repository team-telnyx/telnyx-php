<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartStreamingParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomParameterShape = array{
 *   name?: string|null, value?: string|null
 * }
 */
final class CustomParameter implements BaseModel
{
    /** @use SdkModel<CustomParameterShape> */
    use SdkModel;

    /**
     * The name of the custom parameter.
     */
    #[Optional]
    public ?string $name;

    /**
     * The value of the custom parameter.
     */
    #[Optional]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $name = null, ?string $value = null): self
    {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * The name of the custom parameter.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The value of the custom parameter.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
