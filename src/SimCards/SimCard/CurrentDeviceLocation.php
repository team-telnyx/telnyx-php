<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCard;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Current physical location data of a given SIM card. Accuracy is given in meters.
 *
 * @phpstan-type CurrentDeviceLocationShape = array{
 *   accuracy?: int|null,
 *   accuracyUnit?: string|null,
 *   latitude?: string|null,
 *   longitude?: string|null,
 * }
 */
final class CurrentDeviceLocation implements BaseModel
{
    /** @use SdkModel<CurrentDeviceLocationShape> */
    use SdkModel;

    #[Optional]
    public ?int $accuracy;

    #[Optional('accuracy_unit')]
    public ?string $accuracyUnit;

    #[Optional]
    public ?string $latitude;

    #[Optional]
    public ?string $longitude;

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
        ?int $accuracy = null,
        ?string $accuracyUnit = null,
        ?string $latitude = null,
        ?string $longitude = null,
    ): self {
        $self = new self;

        null !== $accuracy && $self['accuracy'] = $accuracy;
        null !== $accuracyUnit && $self['accuracyUnit'] = $accuracyUnit;
        null !== $latitude && $self['latitude'] = $latitude;
        null !== $longitude && $self['longitude'] = $longitude;

        return $self;
    }

    public function withAccuracy(int $accuracy): self
    {
        $self = clone $this;
        $self['accuracy'] = $accuracy;

        return $self;
    }

    public function withAccuracyUnit(string $accuracyUnit): self
    {
        $self = clone $this;
        $self['accuracyUnit'] = $accuracyUnit;

        return $self;
    }

    public function withLatitude(string $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLongitude(string $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }
}
