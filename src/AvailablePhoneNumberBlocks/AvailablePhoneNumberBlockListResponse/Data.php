<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CostInformation;
use Telnyx\Feature;
use Telnyx\RegionInformation;

/**
 * @phpstan-import-type CostInformationShape from \Telnyx\CostInformation
 * @phpstan-import-type FeatureShape from \Telnyx\Feature
 * @phpstan-import-type RegionInformationShape from \Telnyx\RegionInformation
 *
 * @phpstan-type DataShape = array{
 *   costInformation?: null|CostInformation|CostInformationShape,
 *   features?: list<Feature|FeatureShape>|null,
 *   phoneNumber?: string|null,
 *   range?: int|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   regionInformation?: list<RegionInformation|RegionInformationShape>|null,
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

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional]
    public ?int $range;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /** @var list<RegionInformation>|null $regionInformation */
    #[Optional('region_information', list: RegionInformation::class)]
    public ?array $regionInformation;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CostInformation|CostInformationShape|null $costInformation
     * @param list<Feature|FeatureShape>|null $features
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param list<RegionInformation|RegionInformationShape>|null $regionInformation
     */
    public static function with(
        CostInformation|array|null $costInformation = null,
        ?array $features = null,
        ?string $phoneNumber = null,
        ?int $range = null,
        RecordType|string|null $recordType = null,
        ?array $regionInformation = null,
    ): self {
        $self = new self;

        null !== $costInformation && $self['costInformation'] = $costInformation;
        null !== $features && $self['features'] = $features;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $range && $self['range'] = $range;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regionInformation && $self['regionInformation'] = $regionInformation;

        return $self;
    }

    /**
     * @param CostInformation|CostInformationShape $costInformation
     */
    public function withCostInformation(
        CostInformation|array $costInformation
    ): self {
        $self = clone $this;
        $self['costInformation'] = $costInformation;

        return $self;
    }

    /**
     * @param list<Feature|FeatureShape> $features
     */
    public function withFeatures(array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

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
     * @param list<RegionInformation|RegionInformationShape> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $self = clone $this;
        $self['regionInformation'] = $regionInformation;

        return $self;
    }
}
