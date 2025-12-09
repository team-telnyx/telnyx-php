<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data\CoverageType;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data\NumberType;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data\PhoneNumberType;

/**
 * @phpstan-type DataShape = array{
 *   administrativeArea?: string|null,
 *   advanceRequirements?: bool|null,
 *   count?: int|null,
 *   coverageType?: value-of<CoverageType>|null,
 *   group?: string|null,
 *   groupType?: string|null,
 *   numberRange?: int|null,
 *   numberType?: value-of<NumberType>|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * Indicates if the phone number requires advance requirements.
     */
    #[Optional('advance_requirements')]
    public ?bool $advanceRequirements;

    #[Optional]
    public ?int $count;

    /** @var value-of<CoverageType>|null $coverageType */
    #[Optional('coverage_type', enum: CoverageType::class)]
    public ?string $coverageType;

    #[Optional]
    public ?string $group;

    #[Optional('group_type')]
    public ?string $groupType;

    #[Optional('number_range')]
    public ?int $numberRange;

    /** @var value-of<NumberType>|null $numberType */
    #[Optional('number_type', enum: NumberType::class)]
    public ?string $numberType;

    /** @var value-of<PhoneNumberType>|null $phoneNumberType */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    #[Optional('record_type')]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CoverageType|value-of<CoverageType> $coverageType
     * @param NumberType|value-of<NumberType> $numberType
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public static function with(
        ?string $administrativeArea = null,
        ?bool $advanceRequirements = null,
        ?int $count = null,
        CoverageType|string|null $coverageType = null,
        ?string $group = null,
        ?string $groupType = null,
        ?int $numberRange = null,
        NumberType|string|null $numberType = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $advanceRequirements && $self['advanceRequirements'] = $advanceRequirements;
        null !== $count && $self['count'] = $count;
        null !== $coverageType && $self['coverageType'] = $coverageType;
        null !== $group && $self['group'] = $group;
        null !== $groupType && $self['groupType'] = $groupType;
        null !== $numberRange && $self['numberRange'] = $numberRange;
        null !== $numberType && $self['numberType'] = $numberType;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * Indicates if the phone number requires advance requirements.
     */
    public function withAdvanceRequirements(bool $advanceRequirements): self
    {
        $self = clone $this;
        $self['advanceRequirements'] = $advanceRequirements;

        return $self;
    }

    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * @param CoverageType|value-of<CoverageType> $coverageType
     */
    public function withCoverageType(CoverageType|string $coverageType): self
    {
        $self = clone $this;
        $self['coverageType'] = $coverageType;

        return $self;
    }

    public function withGroup(string $group): self
    {
        $self = clone $this;
        $self['group'] = $group;

        return $self;
    }

    public function withGroupType(string $groupType): self
    {
        $self = clone $this;
        $self['groupType'] = $groupType;

        return $self;
    }

    public function withNumberRange(int $numberRange): self
    {
        $self = clone $this;
        $self['numberRange'] = $numberRange;

        return $self;
    }

    /**
     * @param NumberType|value-of<NumberType> $numberType
     */
    public function withNumberType(NumberType|string $numberType): self
    {
        $self = clone $this;
        $self['numberType'] = $numberType;

        return $self;
    }

    /**
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
