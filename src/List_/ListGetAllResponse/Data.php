<?php

declare(strict_types=1);

namespace Telnyx\List_\ListGetAllResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\List_\ListGetAllResponse\Data\Number;

/**
 * @phpstan-import-type NumberShape from \Telnyx\List_\ListGetAllResponse\Data\Number
 *
 * @phpstan-type DataShape = array{
 *   numberOfChannels?: int|null,
 *   numbers?: list<Number|NumberShape>|null,
 *   zoneID?: string|null,
 *   zoneName?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('number_of_channels')]
    public ?int $numberOfChannels;

    /** @var list<Number>|null $numbers */
    #[Optional(list: Number::class)]
    public ?array $numbers;

    #[Optional('zone_id')]
    public ?string $zoneID;

    #[Optional('zone_name')]
    public ?string $zoneName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Number|NumberShape>|null $numbers
     */
    public static function with(
        ?int $numberOfChannels = null,
        ?array $numbers = null,
        ?string $zoneID = null,
        ?string $zoneName = null,
    ): self {
        $self = new self;

        null !== $numberOfChannels && $self['numberOfChannels'] = $numberOfChannels;
        null !== $numbers && $self['numbers'] = $numbers;
        null !== $zoneID && $self['zoneID'] = $zoneID;
        null !== $zoneName && $self['zoneName'] = $zoneName;

        return $self;
    }

    public function withNumberOfChannels(int $numberOfChannels): self
    {
        $self = clone $this;
        $self['numberOfChannels'] = $numberOfChannels;

        return $self;
    }

    /**
     * @param list<Number|NumberShape> $numbers
     */
    public function withNumbers(array $numbers): self
    {
        $self = clone $this;
        $self['numbers'] = $numbers;

        return $self;
    }

    public function withZoneID(string $zoneID): self
    {
        $self = clone $this;
        $self['zoneID'] = $zoneID;

        return $self;
    }

    public function withZoneName(string $zoneName): self
    {
        $self = clone $this;
        $self['zoneName'] = $zoneName;

        return $self;
    }
}
