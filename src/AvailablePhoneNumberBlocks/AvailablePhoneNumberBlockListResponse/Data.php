<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RegionInformation;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RegionInformation\RegionType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   costInformation?: CostInformation|null,
 *   features?: list<Feature>|null,
 *   range?: int|null,
 *   recordType?: value-of<RecordType>|null,
 *   regionInformation?: list<RegionInformation>|null,
 *   startingNumber?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('cost_information')]
    public ?CostInformation $costInformation;

    /** @var list<Feature>|null $features */
    #[Optional(list: Feature::class)]
    public ?array $features;

    #[Optional]
    public ?int $range;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /** @var list<RegionInformation>|null $regionInformation */
    #[Optional('region_information', list: RegionInformation::class)]
    public ?array $regionInformation;

    #[Optional('starting_number')]
    public ?string $startingNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CostInformation|array{
     *   currency?: string|null, monthlyCost?: string|null, upfrontCost?: string|null
     * } $costInformation
     * @param list<Feature|array{name?: string|null}> $features
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<RegionInformation|array{
     *   regionName?: string|null, regionType?: value-of<RegionType>|null
     * }> $regionInformation
     */
    public static function with(
        CostInformation|array|null $costInformation = null,
        ?array $features = null,
        ?int $range = null,
        RecordType|string|null $recordType = null,
        ?array $regionInformation = null,
        ?string $startingNumber = null,
    ): self {
        $obj = new self;

        null !== $costInformation && $obj['costInformation'] = $costInformation;
        null !== $features && $obj['features'] = $features;
        null !== $range && $obj['range'] = $range;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $regionInformation && $obj['regionInformation'] = $regionInformation;
        null !== $startingNumber && $obj['startingNumber'] = $startingNumber;

        return $obj;
    }

    /**
     * @param CostInformation|array{
     *   currency?: string|null, monthlyCost?: string|null, upfrontCost?: string|null
     * } $costInformation
     */
    public function withCostInformation(
        CostInformation|array $costInformation
    ): self {
        $obj = clone $this;
        $obj['costInformation'] = $costInformation;

        return $obj;
    }

    /**
     * @param list<Feature|array{name?: string|null}> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

        return $obj;
    }

    public function withRange(int $range): self
    {
        $obj = clone $this;
        $obj['range'] = $range;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * @param list<RegionInformation|array{
     *   regionName?: string|null, regionType?: value-of<RegionType>|null
     * }> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $obj = clone $this;
        $obj['regionInformation'] = $regionInformation;

        return $obj;
    }

    public function withStartingNumber(string $startingNumber): self
    {
        $obj = clone $this;
        $obj['startingNumber'] = $startingNumber;

        return $obj;
    }
}
