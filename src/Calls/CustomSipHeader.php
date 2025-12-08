<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomSipHeaderShape = array{name: string, value: string}
 */
final class CustomSipHeader implements BaseModel
{
    /** @use SdkModel<CustomSipHeaderShape> */
    use SdkModel;

    /**
     * The name of the header to add.
     */
    #[Required]
    public string $name;

    /**
     * The value of the header.
     */
    #[Required]
    public string $value;

    /**
     * `new CustomSipHeader()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomSipHeader::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomSipHeader)->withName(...)->withValue(...)
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
        $obj = new self;

        $obj['name'] = $name;
        $obj['value'] = $value;

        return $obj;
    }

    /**
     * The name of the header to add.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The value of the header.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
