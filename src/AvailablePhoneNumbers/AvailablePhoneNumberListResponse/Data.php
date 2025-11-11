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
 * @phpstan-type DataShape = array{
 *   best_effort?: bool|null,
 *   cost_information?: CostInformation|null,
 *   features?: list<Feature>|null,
 *   phone_number?: string|null,
 *   quickship?: bool|null,
 *   record_type?: value-of<RecordType>|null,
 *   region_information?: list<RegionInformation>|null,
 *   reservable?: bool|null,
 *   vanity_format?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Specifies whether the phone number is an exact match based on the search criteria or not.
     */
    #[Api(optional: true)]
    public ?bool $best_effort;

    #[Api(optional: true)]
    public ?CostInformation $cost_information;

    /** @var list<Feature>|null $features */
    #[Api(list: Feature::class, optional: true)]
    public ?array $features;

    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Specifies whether the phone number can receive calls immediately after purchase or not.
     */
    #[Api(optional: true)]
    public ?bool $quickship;

    /** @var value-of<RecordType>|null $record_type */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /** @var list<RegionInformation>|null $region_information */
    #[Api(list: RegionInformation::class, optional: true)]
    public ?array $region_information;

    /**
     * Specifies whether the phone number can be reserved before purchase or not.
     */
    #[Api(optional: true)]
    public ?bool $reservable;

    #[Api(optional: true)]
    public ?string $vanity_format;

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
     * @param RecordType|value-of<RecordType> $record_type
     * @param list<RegionInformation> $region_information
     */
    public static function with(
        ?bool $best_effort = null,
        ?CostInformation $cost_information = null,
        ?array $features = null,
        ?string $phone_number = null,
        ?bool $quickship = null,
        RecordType|string|null $record_type = null,
        ?array $region_information = null,
        ?bool $reservable = null,
        ?string $vanity_format = null,
    ): self {
        $obj = new self;

        null !== $best_effort && $obj->best_effort = $best_effort;
        null !== $cost_information && $obj->cost_information = $cost_information;
        null !== $features && $obj->features = $features;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $quickship && $obj->quickship = $quickship;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $region_information && $obj->region_information = $region_information;
        null !== $reservable && $obj->reservable = $reservable;
        null !== $vanity_format && $obj->vanity_format = $vanity_format;

        return $obj;
    }

    /**
     * Specifies whether the phone number is an exact match based on the search criteria or not.
     */
    public function withBestEffort(bool $bestEffort): self
    {
        $obj = clone $this;
        $obj->best_effort = $bestEffort;

        return $obj;
    }

    public function withCostInformation(CostInformation $costInformation): self
    {
        $obj = clone $this;
        $obj->cost_information = $costInformation;

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
        $obj->phone_number = $phoneNumber;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * @param list<RegionInformation> $regionInformation
     */
    public function withRegionInformation(array $regionInformation): self
    {
        $obj = clone $this;
        $obj->region_information = $regionInformation;

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
        $obj->vanity_format = $vanityFormat;

        return $obj;
    }
}
