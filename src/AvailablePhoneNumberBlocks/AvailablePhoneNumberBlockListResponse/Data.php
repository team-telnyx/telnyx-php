<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RegionInformation;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   costInformation?: CostInformation,
 *   features?: list<Feature>,
 *   range?: int,
 *   recordType?: value-of<RecordType>,
 *   regionInformation?: list<RegionInformation>,
 *   startingNumber?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('cost_information', optional: true)]
    public ?CostInformation $costInformation;

    /** @var list<Feature>|null $features */
    #[Api(list: Feature::class, optional: true)]
    public ?array $features;

    #[Api(optional: true)]
    public ?int $range;

    /** @var value-of<RecordType>|null $recordType */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    /** @var list<RegionInformation>|null $regionInformation */
    #[Api('region_information', list: RegionInformation::class, optional: true)]
    public ?array $regionInformation;

    #[Api('starting_number', optional: true)]
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
     * @param list<Feature> $features
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<RegionInformation> $regionInformation
     */
    public static function with(
        ?CostInformation $costInformation = null,
        ?array $features = null,
        ?int $range = null,
        RecordType|string|null $recordType = null,
        ?array $regionInformation = null,
        ?string $startingNumber = null,
    ): self {
        $obj = new self;

        null !== $costInformation && $obj->costInformation = $costInformation;
        null !== $features && $obj->features = $features;
        null !== $range && $obj->range = $range;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $regionInformation && $obj->regionInformation = $regionInformation;
        null !== $startingNumber && $obj->startingNumber = $startingNumber;

        return $obj;
    }

    public function withCostInformation(CostInformation $costInformation): self
    {
        $obj = clone $this;
        $obj->costInformation = $costInformation;

        return $obj;
    }

    /**
     * @param list<Feature> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj->features = $features;

        return $obj;
    }

    public function withRange(int $range): self
    {
        $obj = clone $this;
        $obj->range = $range;

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
     * @param list<RegionInformation> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $obj = clone $this;
        $obj->regionInformation = $regionInformation;

        return $obj;
    }

    public function withStartingNumber(string $startingNumber): self
    {
        $obj = clone $this;
        $obj->startingNumber = $startingNumber;

        return $obj;
    }
}
