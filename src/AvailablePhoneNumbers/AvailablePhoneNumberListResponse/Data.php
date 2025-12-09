<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation\RegionType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   bestEffort?: bool|null,
 *   costInformation?: CostInformation|null,
 *   features?: list<Feature>|null,
 *   phoneNumber?: string|null,
 *   quickship?: bool|null,
 *   recordType?: value-of<RecordType>|null,
 *   regionInformation?: list<RegionInformation>|null,
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
        $obj = new self;

        null !== $bestEffort && $obj['bestEffort'] = $bestEffort;
        null !== $costInformation && $obj['costInformation'] = $costInformation;
        null !== $features && $obj['features'] = $features;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $quickship && $obj['quickship'] = $quickship;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $regionInformation && $obj['regionInformation'] = $regionInformation;
        null !== $reservable && $obj['reservable'] = $reservable;
        null !== $vanityFormat && $obj['vanityFormat'] = $vanityFormat;

        return $obj;
    }

    /**
     * Specifies whether the phone number is an exact match based on the search criteria or not.
     */
    public function withBestEffort(bool $bestEffort): self
    {
        $obj = clone $this;
        $obj['bestEffort'] = $bestEffort;

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

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Specifies whether the phone number can receive calls immediately after purchase or not.
     */
    public function withQuickship(bool $quickship): self
    {
        $obj = clone $this;
        $obj['quickship'] = $quickship;

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

    /**
     * Specifies whether the phone number can be reserved before purchase or not.
     */
    public function withReservable(bool $reservable): self
    {
        $obj = clone $this;
        $obj['reservable'] = $reservable;

        return $obj;
    }

    public function withVanityFormat(string $vanityFormat): self
    {
        $obj = clone $this;
        $obj['vanityFormat'] = $vanityFormat;

        return $obj;
    }
}
