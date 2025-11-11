<?php

declare(strict_types=1);

namespace Telnyx\SimCards\SimCard;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Current physical location data of a given SIM card. Accuracy is given in meters.
 *
 * @phpstan-type CurrentDeviceLocationShape = array{
 *   accuracy?: int|null,
 *   accuracy_unit?: string|null,
 *   latitude?: string|null,
 *   longitude?: string|null,
 * }
 */
final class CurrentDeviceLocation implements BaseModel
{
    /** @use SdkModel<CurrentDeviceLocationShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $accuracy;

    #[Api(optional: true)]
    public ?string $accuracy_unit;

    #[Api(optional: true)]
    public ?string $latitude;

    #[Api(optional: true)]
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
        ?string $accuracy_unit = null,
        ?string $latitude = null,
        ?string $longitude = null,
    ): self {
        $obj = new self;

        null !== $accuracy && $obj->accuracy = $accuracy;
        null !== $accuracy_unit && $obj->accuracy_unit = $accuracy_unit;
        null !== $latitude && $obj->latitude = $latitude;
        null !== $longitude && $obj->longitude = $longitude;

        return $obj;
    }

    public function withAccuracy(int $accuracy): self
    {
        $obj = clone $this;
        $obj->accuracy = $accuracy;

        return $obj;
    }

    public function withAccuracyUnit(string $accuracyUnit): self
    {
        $obj = clone $this;
        $obj->accuracy_unit = $accuracyUnit;

        return $obj;
    }

    public function withLatitude(string $latitude): self
    {
        $obj = clone $this;
        $obj->latitude = $latitude;

        return $obj;
    }

    public function withLongitude(string $longitude): self
    {
        $obj = clone $this;
        $obj->longitude = $longitude;

        return $obj;
    }
}
