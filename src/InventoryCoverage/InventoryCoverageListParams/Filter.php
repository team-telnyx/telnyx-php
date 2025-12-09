<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\CountryCode;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\Feature;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\GroupBy;
use Telnyx\InventoryCoverage\InventoryCoverageListParams\Filter\PhoneNumberType;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[npa], filter[nxx], filter[administrative_area], filter[phone_number_type], filter[country_code], filter[count], filter[features], filter[groupBy].
 *
 * @phpstan-type FilterShape = array{
 *   administrativeArea?: string|null,
 *   count?: bool|null,
 *   countryCode?: value-of<CountryCode>|null,
 *   features?: list<value-of<Feature>>|null,
 *   groupBy?: value-of<GroupBy>|null,
 *   npa?: int|null,
 *   nxx?: int|null,
 *   phoneNumberType?: value-of<PhoneNumberType>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by administrative area.
     */
    #[Optional('administrative_area')]
    public ?string $administrativeArea;

    /**
     * Include count in the result.
     */
    #[Optional]
    public ?bool $count;

    /**
     * Filter by country. Defaults to US.
     *
     * @var value-of<CountryCode>|null $countryCode
     */
    #[Optional('country_code', enum: CountryCode::class)]
    public ?string $countryCode;

    /**
     * Filter if the phone number should be used for voice, fax, mms, sms, emergency. Returns features in the response when used.
     *
     * @var list<value-of<Feature>>|null $features
     */
    #[Optional(list: Feature::class)]
    public ?array $features;

    /**
     * Filter to group results.
     *
     * @var value-of<GroupBy>|null $groupBy
     */
    #[Optional(enum: GroupBy::class)]
    public ?string $groupBy;

    /**
     * Filter by npa.
     */
    #[Optional]
    public ?int $npa;

    /**
     * Filter by nxx.
     */
    #[Optional]
    public ?int $nxx;

    /**
     * Filter by phone number type.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CountryCode|value-of<CountryCode> $countryCode
     * @param list<Feature|value-of<Feature>> $features
     * @param GroupBy|value-of<GroupBy> $groupBy
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public static function with(
        ?string $administrativeArea = null,
        ?bool $count = null,
        CountryCode|string|null $countryCode = null,
        ?array $features = null,
        GroupBy|string|null $groupBy = null,
        ?int $npa = null,
        ?int $nxx = null,
        PhoneNumberType|string|null $phoneNumberType = null,
    ): self {
        $self = new self;

        null !== $administrativeArea && $self['administrativeArea'] = $administrativeArea;
        null !== $count && $self['count'] = $count;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $features && $self['features'] = $features;
        null !== $groupBy && $self['groupBy'] = $groupBy;
        null !== $npa && $self['npa'] = $npa;
        null !== $nxx && $self['nxx'] = $nxx;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Filter by administrative area.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * Include count in the result.
     */
    public function withCount(bool $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * Filter by country. Defaults to US.
     *
     * @param CountryCode|value-of<CountryCode> $countryCode
     */
    public function withCountryCode(CountryCode|string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Filter if the phone number should be used for voice, fax, mms, sms, emergency. Returns features in the response when used.
     *
     * @param list<Feature|value-of<Feature>> $features
     */
    public function withFeatures(array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    /**
     * Filter to group results.
     *
     * @param GroupBy|value-of<GroupBy> $groupBy
     */
    public function withGroupBy(GroupBy|string $groupBy): self
    {
        $self = clone $this;
        $self['groupBy'] = $groupBy;

        return $self;
    }

    /**
     * Filter by npa.
     */
    public function withNpa(int $npa): self
    {
        $self = clone $this;
        $self['npa'] = $npa;

        return $self;
    }

    /**
     * Filter by nxx.
     */
    public function withNxx(int $nxx): self
    {
        $self = clone $this;
        $self['nxx'] = $nxx;

        return $self;
    }

    /**
     * Filter by phone number type.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }
}
