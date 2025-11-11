<?php

declare(strict_types=1);

namespace Telnyx\List\ListGetByZoneResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\List\ListGetByZoneResponse\Data\Number;

/**
 * @phpstan-type DataShape = array{
 *   number_of_channels?: int|null,
 *   numbers?: list<Number>|null,
 *   zone_id?: string|null,
 *   zone_name?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $number_of_channels;

    /** @var list<Number>|null $numbers */
    #[Api(list: Number::class, optional: true)]
    public ?array $numbers;

    #[Api(optional: true)]
    public ?string $zone_id;

    #[Api(optional: true)]
    public ?string $zone_name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Number> $numbers
     */
    public static function with(
        ?int $number_of_channels = null,
        ?array $numbers = null,
        ?string $zone_id = null,
        ?string $zone_name = null,
    ): self {
        $obj = new self;

        null !== $number_of_channels && $obj->number_of_channels = $number_of_channels;
        null !== $numbers && $obj->numbers = $numbers;
        null !== $zone_id && $obj->zone_id = $zone_id;
        null !== $zone_name && $obj->zone_name = $zone_name;

        return $obj;
    }

    public function withNumberOfChannels(int $numberOfChannels): self
    {
        $obj = clone $this;
        $obj->number_of_channels = $numberOfChannels;

        return $obj;
    }

    /**
     * @param list<Number> $numbers
     */
    public function withNumbers(array $numbers): self
    {
        $obj = clone $this;
        $obj->numbers = $numbers;

        return $obj;
    }

    public function withZoneID(string $zoneID): self
    {
        $obj = clone $this;
        $obj->zone_id = $zoneID;

        return $obj;
    }

    public function withZoneName(string $zoneName): self
    {
        $obj = clone $this;
        $obj->zone_name = $zoneName;

        return $obj;
    }
}
