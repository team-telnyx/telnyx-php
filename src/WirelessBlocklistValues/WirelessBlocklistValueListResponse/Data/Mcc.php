<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MccShape = array{mcc: string}
 */
final class Mcc implements BaseModel
{
    /** @use SdkModel<MccShape> */
    use SdkModel;

    /**
     * Mobile Country Code.
     */
    #[Required]
    public string $mcc;

    /**
     * `new Mcc()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Mcc::with(mcc: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Mcc)->withMcc(...)
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
    public static function with(string $mcc): self
    {
        $self = new self;

        $self['mcc'] = $mcc;

        return $self;
    }

    /**
     * Mobile Country Code.
     */
    public function withMcc(string $mcc): self
    {
        $self = clone $this;
        $self['mcc'] = $mcc;

        return $self;
    }
}
