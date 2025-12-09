<?php

declare(strict_types=1);

namespace Telnyx\List\ListGetByZoneResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\List\ListGetByZoneResponse\Data\Number;

/**
 * @phpstan-type DataShape = array{
 *   numberOfChannels?: int|null,
 *   numbers?: list<Number>|null,
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
     * @param list<Number|array{country?: string|null, number?: string|null}> $numbers
     */
    public static function with(
        ?int $numberOfChannels = null,
        ?array $numbers = null,
        ?string $zoneID = null,
        ?string $zoneName = null,
    ): self {
        $obj = new self;

        null !== $numberOfChannels && $obj['numberOfChannels'] = $numberOfChannels;
        null !== $numbers && $obj['numbers'] = $numbers;
        null !== $zoneID && $obj['zoneID'] = $zoneID;
        null !== $zoneName && $obj['zoneName'] = $zoneName;

        return $obj;
    }

    public function withNumberOfChannels(int $numberOfChannels): self
    {
        $obj = clone $this;
        $obj['numberOfChannels'] = $numberOfChannels;

        return $obj;
    }

    /**
     * @param list<Number|array{country?: string|null, number?: string|null}> $numbers
     */
    public function withNumbers(array $numbers): self
    {
        $obj = clone $this;
        $obj['numbers'] = $numbers;

        return $obj;
    }

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj['zoneID'] = $zoneID;

        return $obj;
    }

    public function withZoneName(string $zoneName): self
    {
        $obj = clone $this;
        $obj['zoneName'] = $zoneName;

        return $obj;
    }
}
