<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PlmnShape = array{plmn: string}
 */
final class Plmn implements BaseModel
{
    /** @use SdkModel<PlmnShape> */
    use SdkModel;

    /**
     * Public land mobile network code (MCC + MNC).
     */
    #[Required]
    public string $plmn;

    /**
     * `new Plmn()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Plmn::with(plmn: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Plmn)->withPlmn(...)
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
    public static function with(string $plmn): self
    {
        $self = new self;

        $self['plmn'] = $plmn;

        return $self;
    }

    /**
     * Public land mobile network code (MCC + MNC).
     */
    public function withPlmn(string $plmn): self
    {
        $self = clone $this;
        $self['plmn'] = $plmn;

        return $self;
    }
}
