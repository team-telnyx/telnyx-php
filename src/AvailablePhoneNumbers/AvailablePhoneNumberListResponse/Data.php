<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   bestEffort?: bool,
 *   costInformation?: CostInformation,
 *   features?: list<Feature>,
 *   phoneNumber?: string,
 *   quickship?: bool,
 *   recordType?: value-of<RecordType>,
 *   regionInformation?: list<RegionInformation>,
 *   reservable?: bool,
 *   vanityFormat?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Specifies whether the phone number is an exact match based on the search criteria or not.
     */
    #[Api('best_effort', optional: true)]
    public ?bool $bestEffort;

    #[Api('cost_information', optional: true)]
    public ?CostInformation $costInformation;

    /** @var list<Feature>|null $features */
    #[Api(list: Feature::class, optional: true)]
    public ?array $features;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Specifies whether the phone number can receive calls immediately after purchase or not.
     */
    #[Api(optional: true)]
    public ?bool $quickship;

    /** @var value-of<RecordType>|null $recordType */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    /** @var list<RegionInformation>|null $regionInformation */
    #[Api('region_information', list: RegionInformation::class, optional: true)]
    public ?array $regionInformation;

    /**
     * Specifies whether the phone number can be reserved before purchase or not.
     */
    #[Api(optional: true)]
    public ?bool $reservable;

    #[Api('vanity_format', optional: true)]
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
     * @param list<Feature> $features
     * @param RecordType|value-of<RecordType> $recordType
     * @param list<RegionInformation> $regionInformation
     */
    public static function with(
        ?bool $bestEffort = null,
        ?CostInformation $costInformation = null,
        ?array $features = null,
        ?string $phoneNumber = null,
        ?bool $quickship = null,
        RecordType|string|null $recordType = null,
        ?array $regionInformation = null,
        ?bool $reservable = null,
        ?string $vanityFormat = null,
    ): self {
        $obj = new self;

        null !== $bestEffort && $obj->bestEffort = $bestEffort;
        null !== $costInformation && $obj->costInformation = $costInformation;
        null !== $features && $obj->features = $features;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $quickship && $obj->quickship = $quickship;
        null !== $recordType && $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;
        null !== $regionInformation && $obj->regionInformation = $regionInformation;
        null !== $reservable && $obj->reservable = $reservable;
        null !== $vanityFormat && $obj->vanityFormat = $vanityFormat;

        return $obj;
    }

    /**
     * Specifies whether the phone number is an exact match based on the search criteria or not.
     */
    public function withBestEffort(bool $bestEffort): self
    {
        $obj = clone $this;
        $obj->bestEffort = $bestEffort;

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

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Specifies whether the phone number can receive calls immediately after purchase or not.
     */
    public function withQuickship(bool $quickship): self
    {
        $obj = clone $this;
        $obj->quickship = $quickship;

        return $obj;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

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

    /**
     * Specifies whether the phone number can be reserved before purchase or not.
     */
    public function withReservable(bool $reservable): self
    {
        $obj = clone $this;
        $obj->reservable = $reservable;

        return $obj;
    }

    public function withVanityFormat(string $vanityFormat): self
    {
        $obj = clone $this;
        $obj->vanityFormat = $vanityFormat;

        return $obj;
    }
}
