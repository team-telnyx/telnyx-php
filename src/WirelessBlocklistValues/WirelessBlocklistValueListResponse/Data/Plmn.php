<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PlmnShape = array{code: string, name: string}
 */
final class Plmn implements BaseModel
{
    /** @use SdkModel<PlmnShape> */
    use SdkModel;

    /**
     * Public land mobile network code (MCC + MNC).
     */
    #[Api]
    public string $code;

    /**
     * The name of the network.
     */
    #[Api]
    public string $name;

    /**
     * `new Plmn()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Plmn::with(code: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Plmn)->withCode(...)->withName(...)
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
     * Public land mobile network code (MCC + MNC).
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * The name of the network.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
