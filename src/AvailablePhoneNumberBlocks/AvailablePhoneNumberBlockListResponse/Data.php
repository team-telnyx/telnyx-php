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
        $self = new self;

        null !== $costInformation && $self['costInformation'] = $costInformation;
        null !== $features && $self['features'] = $features;
        null !== $range && $self['range'] = $range;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regionInformation && $self['regionInformation'] = $regionInformation;
        null !== $startingNumber && $self['startingNumber'] = $startingNumber;

        return $self;
    }

    /**
     * @param CostInformation|array{
     *   currency?: string|null, monthlyCost?: string|null, upfrontCost?: string|null
     * } $costInformation
     */
    public function withCostInformation(
        CostInformation|array $costInformation
    ): self {
        $self = clone $this;
        $self['costInformation'] = $costInformation;

        return $self;
    }

    /**
     * @param list<Feature|array{name?: string|null}> $features
     */
    public function withFeatures(array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    public function withRange(int $range): self
    {
        $self = clone $this;
        $self['range'] = $range;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param list<RegionInformation|array{
     *   regionName?: string|null, regionType?: value-of<RegionType>|null
     * }> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $self = clone $this;
        $self['regionInformation'] = $regionInformation;

        return $self;
    }

    public function withStartingNumber(string $startingNumber): self
    {
        $self = clone $this;
        $self['startingNumber'] = $startingNumber;

        return $self;
    }
}
