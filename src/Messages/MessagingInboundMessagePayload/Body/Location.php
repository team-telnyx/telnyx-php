<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\Body;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Location shared in an RCS message.
 *
 * @phpstan-type LocationShape = array{
 *   latitude?: float|null, longitude?: float|null
 * }
 */
final class Location implements BaseModel
{
    /** @use SdkModel<LocationShape> */
    use SdkModel;

    #[Optional]
    public ?float $latitude;

    #[Optional]
    public ?float $longitude;

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
        ?float $latitude = null,
        ?float $longitude = null
    ): self {
        $self = new self;

        null !== $latitude && $self['latitude'] = $latitude;
        null !== $longitude && $self['longitude'] = $longitude;

        return $self;
    }

    public function withLatitude(float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLongitude(float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }
}
