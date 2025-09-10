<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type country_alias = array{code: string, name: string}
 */
final class Country implements BaseModel
{
    /** @use SdkModel<country_alias> */
    use SdkModel;

    /**
     * ISO 3166-1 Alpha-2 Country Code.
     */
    #[Api]
    public string $code;

    /**
     * The name of the country.
     */
    #[Api]
    public string $name;

    /**
     * `new Country()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Country::with(code: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Country)->withCode(...)->withName(...)
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

        $obj->code = $code;
        $obj->name = $name;

        return $obj;
    }

    /**
     * ISO 3166-1 Alpha-2 Country Code.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * The name of the country.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
