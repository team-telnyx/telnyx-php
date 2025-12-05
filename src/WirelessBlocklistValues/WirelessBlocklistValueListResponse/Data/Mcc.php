<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

use Telnyx\Core\Attributes\Api;
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
    #[Api]
    public string $code;

    /**
     * The name of the country.
     */
    #[Api]
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
        $obj = new self;

        $obj['code'] = $code;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Mobile Country Code.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * The name of the country.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
