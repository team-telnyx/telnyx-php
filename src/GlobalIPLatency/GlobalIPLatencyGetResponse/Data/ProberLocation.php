<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ProberLocationShape = array{
 *   id?: string|null, lat?: float|null, lon?: float|null, name?: string|null
 * }
 */
final class ProberLocation implements BaseModel
{
    /** @use SdkModel<ProberLocationShape> */
    use SdkModel;

    /**
     * Location ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * Latitude.
     */
    #[Optional]
    public ?float $lat;

    /**
     * Longitude.
     */
    #[Optional]
    public ?float $lon;

    /**
     * Location name.
     */
    #[Optional]
    public ?string $name;

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
        ?string $id = null,
        ?float $lat = null,
        ?float $lon = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $lat && $self['lat'] = $lat;
        null !== $lon && $self['lon'] = $lon;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Location ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Latitude.
     */
    public function withLat(float $lat): self
    {
        $self = clone $this;
        $self['lat'] = $lat;

        return $self;
    }

    /**
     * Longitude.
     */
    public function withLon(float $lon): self
    {
        $self = clone $this;
        $self['lon'] = $lon;

        return $self;
    }

    /**
     * Location name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
