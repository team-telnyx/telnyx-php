<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CostInformationShape from \Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\CostInformation
 * @phpstan-import-type FeatureShape from \Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\Feature
 * @phpstan-import-type RegionInformationShape from \Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation
 *
 * @phpstan-type DataShape = array{
 *   bestEffort?: bool|null,
 *   costInformation?: null|CostInformation|CostInformationShape,
 *   features?: list<FeatureShape>|null,
 *   phoneNumber?: string|null,
 *   quickship?: bool|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   regionInformation?: list<RegionInformationShape>|null,
 *   reservable?: bool|null,
 *   vanityFormat?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Specifies whether the phone number is an exact match based on the search criteria or not.
     */
    #[Optional('best_effort')]
    public ?bool $bestEffort;

    #[Optional('cost_information')]
    public ?CostInformation $costInformation;

    /** @var list<Feature>|null $features */
    #[Optional(list: Feature::class)]
    public ?array $features;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Specifies whether the phone number can receive calls immediately after purchase or not.
     */
    #[Optional]
    public ?bool $quickship;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /** @var list<RegionInformation>|null $regionInformation */
    #[Optional('region_information', list: RegionInformation::class)]
    public ?array $regionInformation;

    /**
     * Specifies whether the phone number can be reserved before purchase or not.
     */
    #[Optional]
    public ?bool $reservable;

    #[Optional('vanity_format')]
    public ?string $vanityFormat;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CostInformationShape $costInformation
     * @param list<FeatureShape> $features
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<RegionInformationShape> $regionInformation
     */
    public static function with(
        ?bool $bestEffort = null,
        CostInformation|array|null $costInformation = null,
        ?array $features = null,
        ?string $phoneNumber = null,
        ?bool $quickship = null,
        RecordType|string|null $recordType = null,
        ?array $regionInformation = null,
        ?bool $reservable = null,
        ?string $vanityFormat = null,
    ): self {
        $self = new self;

        null !== $bestEffort && $self['bestEffort'] = $bestEffort;
        null !== $costInformation && $self['costInformation'] = $costInformation;
        null !== $features && $self['features'] = $features;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $quickship && $self['quickship'] = $quickship;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $regionInformation && $self['regionInformation'] = $regionInformation;
        null !== $reservable && $self['reservable'] = $reservable;
        null !== $vanityFormat && $self['vanityFormat'] = $vanityFormat;

        return $self;
    }

    /**
     * Specifies whether the phone number is an exact match based on the search criteria or not.
     */
    public function withBestEffort(bool $bestEffort): self
    {
        $self = clone $this;
        $self['bestEffort'] = $bestEffort;

        return $self;
    }

    /**
     * @param CostInformationShape $costInformation
     */
    public function withCostInformation(
        CostInformation|array $costInformation
    ): self {
        $self = clone $this;
        $self['costInformation'] = $costInformation;

        return $self;
    }

    /**
     * @param list<FeatureShape> $features
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

    /**
     * Specifies whether the phone number can receive calls immediately after purchase or not.
     */
    public function withQuickship(bool $quickship): self
    {
        $self = clone $this;
        $self['quickship'] = $quickship;

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
     * @param list<RegionInformationShape> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $self = clone $this;
        $self['regionInformation'] = $regionInformation;

        return $self;
    }

    /**
     * Specifies whether the phone number can be reserved before purchase or not.
     */
    public function withReservable(bool $reservable): self
    {
        $self = clone $this;
        $self['reservable'] = $reservable;

        return $self;
    }

    public function withVanityFormat(string $vanityFormat): self
    {
        $self = clone $this;
        $self['vanityFormat'] = $vanityFormat;

        return $self;
    }
}
