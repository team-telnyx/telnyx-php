<?php

declare(strict_types=1);

namespace Telnyx\List\ListGetAllResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\List\ListGetAllResponse\Data\Number;

/**
 * @phpstan-type data_alias = array{
 *   numberOfChannels?: int,
 *   numbers?: list<Number>,
 *   zoneID?: string,
 *   zoneName?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('number_of_channels', optional: true)]
    public ?int $numberOfChannels;

    /** @var list<Number>|null $numbers */
    #[Api(list: Number::class, optional: true)]
    public ?array $numbers;

    #[Api('zone_id', optional: true)]
    public ?string $zoneID;

    #[Api('zone_name', optional: true)]
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
     * @param list<Number> $numbers
     */
    public static function with(
        ?int $numberOfChannels = null,
        ?array $numbers = null,
        ?string $zoneID = null,
        ?string $zoneName = null,
    ): self {
        $obj = new self;

        null !== $numberOfChannels && $obj->numberOfChannels = $numberOfChannels;
        null !== $numbers && $obj->numbers = $numbers;
        null !== $zoneID && $obj->zoneID = $zoneID;
        null !== $zoneName && $obj->zoneName = $zoneName;

        return $obj;
    }

    public function withNumberOfChannels(int $numberOfChannels): self
    {
        $obj = clone $this;
        $obj->numberOfChannels = $numberOfChannels;

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
        $obj->zoneID = $zoneID;

        return $obj;
    }

    public function withZoneName(string $zoneName): self
    {
        $obj = clone $this;
        $obj->zoneName = $zoneName;

        return $obj;
    }
}
