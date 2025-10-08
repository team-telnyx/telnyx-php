<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Calls\SipHeader\Name;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type sip_header = array{name: value-of<Name>, value: string}
 */
final class SipHeader implements BaseModel
{
    /** @use SdkModel<sip_header> */
    use SdkModel;

    /**
     * The name of the header to add.
     *
     * @var value-of<Name> $name
     */
    #[Api(enum: Name::class)]
    public string $name;

    /**
     * The value of the header.
     */
    #[Api]
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
        $obj = new self;

        $obj->name = $name instanceof Name ? $name->value : $name;
        $obj->value = $value;

        return $obj;
    }

    /**
     * The name of the header to add.
     *
     * @param Name|value-of<Name> $name
     */
    public function withName(Name|string $name): self
    {
        $obj = clone $this;
        $obj->name = $name instanceof Name ? $name->value : $name;

        return $obj;
    }

    /**
     * The value of the header.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
