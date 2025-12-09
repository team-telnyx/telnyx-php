<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Calls\SipHeader\Name;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SipHeaderShape = array{name: value-of<Name>, value: string}
 */
final class SipHeader implements BaseModel
{
    /** @use SdkModel<SipHeaderShape> */
    use SdkModel;

    /**
     * The name of the header to add.
     *
     * @var value-of<Name> $name
     */
    #[Required(enum: Name::class)]
    public string $name;

    /**
     * The value of the header.
     */
    #[Required]
    public string $value;

    /**
     * `new SipHeader()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SipHeader::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SipHeader)->withName(...)->withValue(...)
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
     * @param Name|value-of<Name> $name
     */
    public static function with(Name|string $name, string $value): self
    {
        $self = new self;

        $self['name'] = $name;
        $self['value'] = $value;

        return $self;
    }

    /**
     * The name of the header to add.
     *
     * @param Name|value-of<Name> $name
     */
    public function withName(Name|string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The value of the header.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
