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
 *   administrative_area?: string|null,
 *   advance_requirements?: bool|null,
 *   count?: int|null,
 *   coverage_type?: value-of<CoverageType>|null,
 *   group?: string|null,
 *   group_type?: string|null,
 *   number_range?: int|null,
 *   number_type?: value-of<NumberType>|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $administrative_area;

    /**
     * Indicates if the phone number requires advance requirements.
     */
    #[Optional]
    public ?bool $advance_requirements;

    #[Optional]
    public ?int $count;

    /** @var value-of<CoverageType>|null $coverage_type */
    #[Optional(enum: CoverageType::class)]
    public ?string $coverage_type;

    #[Optional]
    public ?string $group;

    #[Optional]
    public ?string $group_type;

    #[Optional]
    public ?int $number_range;

    /** @var value-of<NumberType>|null $number_type */
    #[Optional(enum: NumberType::class)]
    public ?string $number_type;

    /** @var value-of<PhoneNumberType>|null $phone_number_type */
    #[Optional(enum: PhoneNumberType::class)]
    public ?string $phone_number_type;

    #[Optional]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CoverageType|value-of<CoverageType> $coverage_type
     * @param NumberType|value-of<NumberType> $number_type
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        ?string $administrative_area = null,
        ?bool $advance_requirements = null,
        ?int $count = null,
        CoverageType|string|null $coverage_type = null,
        ?string $group = null,
        ?string $group_type = null,
        ?int $number_range = null,
        NumberType|string|null $number_type = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $administrative_area && $obj['administrative_area'] = $administrative_area;
        null !== $advance_requirements && $obj['advance_requirements'] = $advance_requirements;
        null !== $count && $obj['count'] = $count;
        null !== $coverage_type && $obj['coverage_type'] = $coverage_type;
        null !== $group && $obj['group'] = $group;
        null !== $group_type && $obj['group_type'] = $group_type;
        null !== $number_range && $obj['number_range'] = $number_range;
        null !== $number_type && $obj['number_type'] = $number_type;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj['administrative_area'] = $administrativeArea;

        return $obj;
    }

    /**
     * Indicates if the phone number requires advance requirements.
     */
    public function withAdvanceRequirements(bool $advanceRequirements): self
    {
        $obj = clone $this;
        $obj['advance_requirements'] = $advanceRequirements;

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
        $obj['coverage_type'] = $coverageType;

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
        $obj['group_type'] = $groupType;

        return $obj;
    }

    public function withNumberRange(int $numberRange): self
    {
        $obj = clone $this;
        $obj['number_range'] = $numberRange;

        return $obj;
    }

    /**
     * @param NumberType|value-of<NumberType> $numberType
     */
    public function withNumberType(NumberType|string $numberType): self
    {
        $obj = clone $this;
        $obj['number_type'] = $numberType;

        return $obj;
    }

    /**
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
