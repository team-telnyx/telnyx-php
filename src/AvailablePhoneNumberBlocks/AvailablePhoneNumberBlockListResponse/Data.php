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
 *   cost_information?: CostInformation|null,
 *   features?: list<Feature>|null,
 *   range?: int|null,
 *   record_type?: value-of<RecordType>|null,
 *   region_information?: list<RegionInformation>|null,
 *   starting_number?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?CostInformation $cost_information;

    /** @var list<Feature>|null $features */
    #[Optional(list: Feature::class)]
    public ?array $features;

    #[Optional]
    public ?int $range;

    /** @var value-of<RecordType>|null $record_type */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

    /** @var list<RegionInformation>|null $region_information */
    #[Optional(list: RegionInformation::class)]
    public ?array $region_information;

    #[Optional]
    public ?string $starting_number;

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
     *   currency?: string|null, monthly_cost?: string|null, upfront_cost?: string|null
     * } $cost_information
     * @param list<Feature|array{name?: string|null}> $features
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<RegionInformation|array{
     *   region_name?: string|null, region_type?: value-of<RegionType>|null
     * }> $region_information
     */
    public static function with(
        CostInformation|array|null $cost_information = null,
        ?array $features = null,
        ?int $range = null,
        RecordType|string|null $record_type = null,
        ?array $region_information = null,
        ?string $starting_number = null,
    ): self {
        $obj = new self;

        null !== $cost_information && $obj['cost_information'] = $cost_information;
        null !== $features && $obj['features'] = $features;
        null !== $range && $obj['range'] = $range;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $region_information && $obj['region_information'] = $region_information;
        null !== $starting_number && $obj['starting_number'] = $starting_number;

        return $obj;
    }

    /**
     * @param CostInformation|array{
     *   currency?: string|null, monthly_cost?: string|null, upfront_cost?: string|null
     * } $costInformation
     */
    public function withCostInformation(
        CostInformation|array $costInformation
    ): self {
        $obj = clone $this;
        $obj['cost_information'] = $costInformation;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * @param list<RegionInformation|array{
     *   region_name?: string|null, region_type?: value-of<RegionType>|null
     * }> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $obj = clone $this;
        $obj['region_information'] = $regionInformation;

        return $obj;
    }

    public function withStartingNumber(string $startingNumber): self
    {
        $obj = clone $this;
        $obj['starting_number'] = $startingNumber;

        return $obj;
    }
}
