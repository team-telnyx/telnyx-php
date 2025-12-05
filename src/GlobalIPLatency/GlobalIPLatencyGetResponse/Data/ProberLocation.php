<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPLatency\GlobalIPLatencyGetResponse\Data;

use Telnyx\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Latitude.
     */
    #[Api(optional: true)]
    public ?float $lat;

    /**
     * Longitude.
     */
    #[Api(optional: true)]
    public ?float $lon;

    /**
     * Location name.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $lat && $obj['lat'] = $lat;
        null !== $lon && $obj['lon'] = $lon;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    /**
     * Location ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Latitude.
     */
    public function withLat(float $lat): self
    {
        $obj = clone $this;
        $obj['lat'] = $lat;

        return $obj;
    }

    /**
     * Longitude.
     */
    public function withLon(float $lon): self
    {
        $obj = clone $this;
        $obj['lon'] = $lon;

        return $obj;
    }

    /**
     * Location name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
