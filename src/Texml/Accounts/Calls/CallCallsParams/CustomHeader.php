<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Calls\CallCallsParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomHeaderShape = array{name: string, value: string}
 */
final class CustomHeader implements BaseModel
{
    /** @use SdkModel<CustomHeaderShape> */
    use SdkModel;

    /**
     * The name of the custom header.
     */
    #[Required]
    public string $name;

    /**
     * The value of the custom header.
     */
    #[Required]
    public string $value;

    /**
     * `new CustomHeader()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomHeader::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomHeader)->withName(...)->withValue(...)
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
     */
    public static function with(string $name, string $value): self
    {
        $self = new self;

        $self['name'] = $name;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The name of the custom header.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The value of the custom header.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
