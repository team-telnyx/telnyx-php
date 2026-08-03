<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomain;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InboundShape = array{
 *   catchAll: bool, enabled: bool, mxRequired: bool
 * }
 */
final class Inbound implements BaseModel
{
    /** @use SdkModel<InboundShape> */
    use SdkModel;

    #[Required('catch_all')]
    public bool $catchAll;

    #[Required]
    public bool $enabled;

    #[Required('mx_required')]
    public bool $mxRequired;

    /**
     * `new Inbound()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Inbound::with(catchAll: ..., enabled: ..., mxRequired: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Inbound)->withCatchAll(...)->withEnabled(...)->withMxRequired(...)
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
        bool $catchAll,
        bool $enabled,
        bool $mxRequired
    ): self {
        $self = new self;

        $self['catchAll'] = $catchAll;
        $self['enabled'] = $enabled;
        $self['mxRequired'] = $mxRequired;

        return $self;
    }

    public function withCatchAll(bool $catchAll): self
    {
        $self = clone $this;
        $self['catchAll'] = $catchAll;

        return $self;
    }

    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    public function withMxRequired(bool $mxRequired): self
    {
        $self = clone $this;
        $self['mxRequired'] = $mxRequired;

        return $self;
    }
}
