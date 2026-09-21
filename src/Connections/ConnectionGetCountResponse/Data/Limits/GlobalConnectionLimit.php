<?php

declare(strict_types=1);

namespace Telnyx\Connections\ConnectionGetCountResponse\Data\Limits;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type GlobalConnectionLimitShape = array{globalLimit: int}
 */
final class GlobalConnectionLimit implements BaseModel
{
    /** @use SdkModel<GlobalConnectionLimitShape> */
    use SdkModel;

    /**
     * Maximum total number of connections allowed, when a global limit applies.
     */
    #[Required('global_limit')]
    public int $globalLimit;

    /**
     * `new GlobalConnectionLimit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GlobalConnectionLimit::with(globalLimit: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GlobalConnectionLimit)->withGlobalLimit(...)
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
    public static function with(int $globalLimit): self
    {
        $self = new self;

        $self['globalLimit'] = $globalLimit;

        return $self;
    }

    /**
     * Maximum total number of connections allowed, when a global limit applies.
     */
    public function withGlobalLimit(int $globalLimit): self
    {
        $self = clone $this;
        $self['globalLimit'] = $globalLimit;

        return $self;
    }
}
