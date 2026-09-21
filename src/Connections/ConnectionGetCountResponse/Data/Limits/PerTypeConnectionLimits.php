<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionGetCountResponse\Data\Limits;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PerTypeConnectionLimitsShape = array{
 *   standardLimit: int, texmlLimit: int, uacLimit: int
 * }
 */
final class PerTypeConnectionLimits implements BaseModel
{
    /** @use SdkModel<PerTypeConnectionLimitsShape> */
    use SdkModel;

    /**
     * Maximum number of standard connections allowed, when per-type limits apply.
     */
    #[Required('standard_limit')]
    public int $standardLimit;

    /**
     * Maximum number of TeXML applications allowed, when per-type limits apply.
     */
    #[Required('texml_limit')]
    public int $texmlLimit;

    /**
     * Maximum number of UAC connections allowed, when per-type limits apply.
     */
    #[Required('uac_limit')]
    public int $uacLimit;

    /**
     * `new PerTypeConnectionLimits()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PerTypeConnectionLimits::with(
     *   standardLimit: ..., texmlLimit: ..., uacLimit: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PerTypeConnectionLimits)
     *   ->withStandardLimit(...)
     *   ->withTexmlLimit(...)
     *   ->withUacLimit(...)
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
    public static function with(
        int $standardLimit,
        int $texmlLimit,
        int $uacLimit
    ): self {
        $self = new self;

        $self['standardLimit'] = $standardLimit;
        $self['texmlLimit'] = $texmlLimit;
        $self['uacLimit'] = $uacLimit;

        return $self;
    }

    /**
     * Maximum number of standard connections allowed, when per-type limits apply.
     */
    public function withStandardLimit(int $standardLimit): self
    {
        $self = clone $this;
        $self['standardLimit'] = $standardLimit;

        return $self;
    }

    /**
     * Maximum number of TeXML applications allowed, when per-type limits apply.
     */
    public function withTexmlLimit(int $texmlLimit): self
    {
        $self = clone $this;
        $self['texmlLimit'] = $texmlLimit;

        return $self;
    }

    /**
     * Maximum number of UAC connections allowed, when per-type limits apply.
     */
    public function withUacLimit(int $uacLimit): self
    {
        $self = clone $this;
        $self['uacLimit'] = $uacLimit;

        return $self;
    }
}
