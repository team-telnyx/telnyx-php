<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

use Telnyx\Core\Attributes\Required;
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
    #[Required]
    public string $code;

    /**
     * The name of the network.
     */
    #[Required]
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
        $self = new self;

        $self['code'] = $code;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Public land mobile network code (MCC + MNC).
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * The name of the network.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
