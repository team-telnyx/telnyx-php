<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MccShape = array{code: string, name: string}
 */
final class Mcc implements BaseModel
{
    /** @use SdkModel<MccShape> */
    use SdkModel;

    /**
     * Mobile Country Code.
     */
    #[Required]
    public string $code;

    /**
     * The name of the country.
     */
    #[Required]
    public string $name;

    /**
     * `new Mcc()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Mcc::with(code: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Mcc)->withCode(...)->withName(...)
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
    public static function with(string $code, string $name): self
    {
        $self = new self;

        $self['code'] = $code;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Mobile Country Code.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * The name of the country.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
