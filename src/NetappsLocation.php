<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NetappsLocationShape = array{
 *   code?: string|null,
 *   name?: string|null,
 *   pop?: string|null,
 *   region?: string|null,
 *   site?: string|null,
 * }
 */
final class NetappsLocation implements BaseModel
{
    /** @use SdkModel<NetappsLocationShape> */
    use SdkModel;

    /**
     * Location code.
     */
    #[Optional]
    public ?string $code;

    /**
     * Human readable name of location.
     */
    #[Optional]
    public ?string $name;

    /**
     * Point of presence of location.
     */
    #[Optional]
    public ?string $pop;

    /**
     * Identifies the geographical region of location.
     */
    #[Optional]
    public ?string $region;

    /**
     * Site of location.
     */
    #[Optional]
    public ?string $site;

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
        ?string $code = null,
        ?string $name = null,
        ?string $pop = null,
        ?string $region = null,
        ?string $site = null,
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $name && $self['name'] = $name;
        null !== $pop && $self['pop'] = $pop;
        null !== $region && $self['region'] = $region;
        null !== $site && $self['site'] = $site;

        return $self;
    }

    /**
     * Location code.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Human readable name of location.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Point of presence of location.
     */
    public function withPop(string $pop): self
    {
        $self = clone $this;
        $self['pop'] = $pop;

        return $self;
    }

    /**
     * Identifies the geographical region of location.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Site of location.
     */
    public function withSite(string $site): self
    {
        $self = clone $this;
        $self['site'] = $site;

        return $self;
    }
}
