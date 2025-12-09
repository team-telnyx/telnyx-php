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
        $obj = new self;

        null !== $administrativeArea && $obj['administrativeArea'] = $administrativeArea;
        null !== $advanceRequirements && $obj['advanceRequirements'] = $advanceRequirements;
        null !== $count && $obj['count'] = $count;
        null !== $coverageType && $obj['coverageType'] = $coverageType;
        null !== $group && $obj['group'] = $group;
        null !== $groupType && $obj['groupType'] = $groupType;
        null !== $numberRange && $obj['numberRange'] = $numberRange;
        null !== $numberType && $obj['numberType'] = $numberType;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $obj['recordType'] = $recordType;

        return $obj;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrativeArea'] = $administrativeArea;

        return $obj;
    }

    /**
     * Indicates if the phone number requires advance requirements.
     */
    public function withAdvanceRequirements(bool $advanceRequirements): self
    {
        $obj = clone $this;
        $obj['advanceRequirements'] = $advanceRequirements;

        return $obj;
    }

    public function withCount(int $count): self
    {
        $obj = clone $this;
        $obj['count'] = $count;

        return $obj;
    }

    /**
     * @param CoverageType|value-of<CoverageType> $coverageType
     */
    public function withCoverageType(CoverageType|string $coverageType): self
    {
        $obj = clone $this;
        $obj['coverageType'] = $coverageType;

        return $obj;
    }

    public function withGroup(string $group): self
    {
        $obj = clone $this;
        $obj['group'] = $group;

        return $obj;
    }

    public function withGroupType(string $groupType): self
    {
        $obj = clone $this;
        $obj['groupType'] = $groupType;

        return $obj;
    }

    public function withNumberRange(int $numberRange): self
    {
        $obj = clone $this;
        $obj['numberRange'] = $numberRange;

        return $obj;
    }

    /**
     * @param NumberType|value-of<NumberType> $numberType
     */
    public function withNumberType(NumberType|string $numberType): self
    {
        $obj = clone $this;
        $obj['numberType'] = $numberType;

        return $obj;
    }

    /**
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }
}
