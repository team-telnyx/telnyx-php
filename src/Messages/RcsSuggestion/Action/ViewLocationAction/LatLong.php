<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsSuggestion\Action\ViewLocationAction;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type LatLongShape = array{latitude: float, longitude: float}
 */
final class LatLong implements BaseModel
{
    /** @use SdkModel<LatLongShape> */
    use SdkModel;

    /**
     * The latitude in degrees. It must be in the range [-90.0, +90.0].
     */
    #[Required]
    public float $latitude;

    /**
     * The longitude in degrees. It must be in the range [-180.0, +180.0].
     */
    #[Required]
    public float $longitude;

    /**
     * `new LatLong()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LatLong::with(latitude: ..., longitude: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LatLong)->withLatitude(...)->withLongitude(...)
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
    public static function with(float $latitude, float $longitude): self
    {
        $self = new self;

        $self['latitude'] = $latitude;
        $self['longitude'] = $longitude;

        return $self;
    }

    /**
     * The latitude in degrees. It must be in the range [-90.0, +90.0].
     */
    public function withLatitude(float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    /**
     * The longitude in degrees. It must be in the range [-180.0, +180.0].
     */
    public function withLongitude(float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }
}
