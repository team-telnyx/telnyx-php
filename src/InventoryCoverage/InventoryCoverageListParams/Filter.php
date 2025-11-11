<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage\InventoryCoverageListParams;

use Telnyx\Core\Attributes\Api;
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
 *   administrative_area?: string|null,
 *   count?: bool|null,
 *   country_code?: value-of<CountryCode>|null,
 *   features?: list<value-of<Feature>>|null,
 *   groupBy?: value-of<GroupBy>|null,
 *   npa?: int|null,
 *   nxx?: int|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by administrative area.
     */
    #[Api(optional: true)]
    public ?string $administrative_area;

    /**
     * Include count in the result.
     */
    #[Api(optional: true)]
    public ?bool $count;

    /**
     * Filter by country. Defaults to US.
     *
     * @var value-of<CountryCode>|null $country_code
     */
    #[Api(enum: CountryCode::class, optional: true)]
    public ?string $country_code;

    /**
     * Filter if the phone number should be used for voice, fax, mms, sms, emergency. Returns features in the response when used.
     *
     * @var list<value-of<Feature>>|null $features
     */
    #[Api(list: Feature::class, optional: true)]
    public ?array $features;

    /**
     * Filter to group results.
     *
     * @var value-of<GroupBy>|null $groupBy
     */
    #[Api(enum: GroupBy::class, optional: true)]
    public ?string $groupBy;

    /**
     * Filter by npa.
     */
    #[Api(optional: true)]
    public ?int $npa;

    /**
     * Filter by nxx.
     */
    #[Api(optional: true)]
    public ?int $nxx;

    /**
     * Filter by phone number type.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CountryCode|value-of<CountryCode> $country_code
     * @param list<Feature|value-of<Feature>> $features
     * @param GroupBy|value-of<GroupBy> $groupBy
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        ?string $administrative_area = null,
        ?bool $count = null,
        CountryCode|string|null $country_code = null,
        ?array $features = null,
        GroupBy|string|null $groupBy = null,
        ?int $npa = null,
        ?int $nxx = null,
        PhoneNumberType|string|null $phone_number_type = null,
    ): self {
        $obj = new self;

        null !== $administrative_area && $obj->administrative_area = $administrative_area;
        null !== $count && $obj->count = $count;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $features && $obj['features'] = $features;
        null !== $groupBy && $obj['groupBy'] = $groupBy;
        null !== $npa && $obj->npa = $npa;
        null !== $nxx && $obj->nxx = $nxx;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;

        return $obj;
    }

    /**
     * Filter by administrative area.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $obj = clone $this;
        $obj->administrative_area = $administrativeArea;

        return $obj;
    }

    /**
     * Include count in the result.
     */
    public function withCount(bool $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * Filter by country. Defaults to US.
     *
     * @param CountryCode|value-of<CountryCode> $countryCode
     */
    public function withCountryCode(CountryCode|string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * Filter if the phone number should be used for voice, fax, mms, sms, emergency. Returns features in the response when used.
     *
     * @param list<Feature|value-of<Feature>> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

        return $obj;
    }

    /**
     * Filter to group results.
     *
     * @param GroupBy|value-of<GroupBy> $groupBy
     */
    public function withGroupBy(GroupBy|string $groupBy): self
    {
        $obj = clone $this;
        $obj['groupBy'] = $groupBy;

        return $obj;
    }

    /**
     * Filter by npa.
     */
    public function withNpa(int $npa): self
    {
        $obj = clone $this;
        $obj->npa = $npa;

        return $obj;
    }

    /**
     * Filter by nxx.
     */
    public function withNxx(int $nxx): self
    {
        $obj = clone $this;
        $obj->nxx = $nxx;

        return $obj;
    }

    /**
     * Filter by phone number type.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }
}
