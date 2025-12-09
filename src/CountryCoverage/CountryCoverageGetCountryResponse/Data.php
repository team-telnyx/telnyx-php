<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage\CountryCoverageGetCountryResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse\Data\Local;
use Telnyx\CountryCoverage\CountryCoverageGetCountryResponse\Data\TollFree;

/**
 * @phpstan-type DataShape = array{
 *   code?: string|null,
 *   features?: list<string>|null,
 *   internationalSMS?: bool|null,
 *   inventoryCoverage?: bool|null,
 *   local?: Local|null,
 *   mobile?: array<string,mixed>|null,
 *   national?: array<string,mixed>|null,
 *   numbers?: bool|null,
 *   p2p?: bool|null,
 *   phoneNumberType?: list<string>|null,
 *   quickship?: bool|null,
 *   region?: string|null,
 *   reservable?: bool|null,
 *   sharedCost?: array<string,mixed>|null,
 *   tollFree?: TollFree|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Country ISO code.
     */
    #[Optional]
    public ?string $code;

    /**
     * Set of features supported.
     *
     * @var list<string>|null $features
     */
    #[Optional(list: 'string')]
    public ?array $features;

    #[Optional('international_sms')]
    public ?bool $internationalSMS;

    /**
     * Indicates whether country can be queried with inventory coverage endpoint.
     */
    #[Optional('inventory_coverage')]
    public ?bool $inventoryCoverage;

    #[Optional]
    public ?Local $local;

    /** @var array<string,mixed>|null $mobile */
    #[Optional(map: 'mixed')]
    public ?array $mobile;

    /** @var array<string,mixed>|null $national */
    #[Optional(map: 'mixed')]
    public ?array $national;

    #[Optional]
    public ?bool $numbers;

    #[Optional]
    public ?bool $p2p;

    /**
     * Phone number type.
     *
     * @var list<string>|null $phoneNumberType
     */
    #[Optional('phone_number_type', list: 'string')]
    public ?array $phoneNumberType;

    /**
     * Supports quickship.
     */
    #[Optional]
    public ?bool $quickship;

    /**
     * Geographic region (e.g., AMER, EMEA, APAC).
     */
    #[Optional(nullable: true)]
    public ?string $region;

    /**
     * Supports reservable.
     */
    #[Optional]
    public ?bool $reservable;

    /** @var array<string,mixed>|null $sharedCost */
    #[Optional('shared_cost', map: 'mixed')]
    public ?array $sharedCost;

    #[Optional('toll_free')]
    public ?TollFree $tollFree;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $features
     * @param Local|array{
     *   features?: list<string>|null,
     *   fullPstnReplacement?: bool|null,
     *   internationalSMS?: bool|null,
     *   p2p?: bool|null,
     *   quickship?: bool|null,
     *   reservable?: bool|null,
     * } $local
     * @param array<string,mixed> $mobile
     * @param array<string,mixed> $national
     * @param list<string> $phoneNumberType
     * @param array<string,mixed> $sharedCost
     * @param TollFree|array{
     *   features?: list<string>|null,
     *   fullPstnReplacement?: bool|null,
     *   internationalSMS?: bool|null,
     *   p2p?: bool|null,
     *   quickship?: bool|null,
     *   reservable?: bool|null,
     * } $tollFree
     */
    public static function with(
        ?string $code = null,
        ?array $features = null,
        ?bool $internationalSMS = null,
        ?bool $inventoryCoverage = null,
        Local|array|null $local = null,
        ?array $mobile = null,
        ?array $national = null,
        ?bool $numbers = null,
        ?bool $p2p = null,
        ?array $phoneNumberType = null,
        ?bool $quickship = null,
        ?string $region = null,
        ?bool $reservable = null,
        ?array $sharedCost = null,
        TollFree|array|null $tollFree = null,
    ): self {
        $obj = new self;

        null !== $code && $obj['code'] = $code;
        null !== $features && $obj['features'] = $features;
        null !== $internationalSMS && $obj['internationalSMS'] = $internationalSMS;
        null !== $inventoryCoverage && $obj['inventoryCoverage'] = $inventoryCoverage;
        null !== $local && $obj['local'] = $local;
        null !== $mobile && $obj['mobile'] = $mobile;
        null !== $national && $obj['national'] = $national;
        null !== $numbers && $obj['numbers'] = $numbers;
        null !== $p2p && $obj['p2p'] = $p2p;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $quickship && $obj['quickship'] = $quickship;
        null !== $region && $obj['region'] = $region;
        null !== $reservable && $obj['reservable'] = $reservable;
        null !== $sharedCost && $obj['sharedCost'] = $sharedCost;
        null !== $tollFree && $obj['tollFree'] = $tollFree;

        return $obj;
    }

    /**
     * Country ISO code.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * Set of features supported.
     *
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

        return $obj;
    }

    public function withInternationalSMS(bool $internationalSMS): self
    {
        $obj = clone $this;
        $obj['internationalSMS'] = $internationalSMS;

        return $obj;
    }

    /**
     * Indicates whether country can be queried with inventory coverage endpoint.
     */
    public function withInventoryCoverage(bool $inventoryCoverage): self
    {
        $obj = clone $this;
        $obj['inventoryCoverage'] = $inventoryCoverage;

        return $obj;
    }

    /**
     * @param Local|array{
     *   features?: list<string>|null,
     *   fullPstnReplacement?: bool|null,
     *   internationalSMS?: bool|null,
     *   p2p?: bool|null,
     *   quickship?: bool|null,
     *   reservable?: bool|null,
     * } $local
     */
    public function withLocal(Local|array $local): self
    {
        $obj = clone $this;
        $obj['local'] = $local;

        return $obj;
    }

    /**
     * @param array<string,mixed> $mobile
     */
    public function withMobile(array $mobile): self
    {
        $obj = clone $this;
        $obj['mobile'] = $mobile;

        return $obj;
    }

    /**
     * @param array<string,mixed> $national
     */
    public function withNational(array $national): self
    {
        $obj = clone $this;
        $obj['national'] = $national;

        return $obj;
    }

    public function withNumbers(bool $numbers): self
    {
        $obj = clone $this;
        $obj['numbers'] = $numbers;

        return $obj;
    }

    public function withP2p(bool $p2p): self
    {
        $obj = clone $this;
        $obj['p2p'] = $p2p;

        return $obj;
    }

    /**
     * Phone number type.
     *
     * @param list<string> $phoneNumberType
     */
    public function withPhoneNumberType(array $phoneNumberType): self
    {
        $obj = clone $this;
        $obj['phoneNumberType'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Supports quickship.
     */
    public function withQuickship(bool $quickship): self
    {
        $obj = clone $this;
        $obj['quickship'] = $quickship;

        return $obj;
    }

    /**
     * Geographic region (e.g., AMER, EMEA, APAC).
     */
    public function withRegion(?string $region): self
    {
        $obj = clone $this;
        $obj['region'] = $region;

        return $obj;
    }

    /**
     * Supports reservable.
     */
    public function withReservable(bool $reservable): self
    {
        $obj = clone $this;
        $obj['reservable'] = $reservable;

        return $obj;
    }

    /**
     * @param array<string,mixed> $sharedCost
     */
    public function withSharedCost(array $sharedCost): self
    {
        $obj = clone $this;
        $obj['sharedCost'] = $sharedCost;

        return $obj;
    }

    /**
     * @param TollFree|array{
     *   features?: list<string>|null,
     *   fullPstnReplacement?: bool|null,
     *   internationalSMS?: bool|null,
     *   p2p?: bool|null,
     *   quickship?: bool|null,
     *   reservable?: bool|null,
     * } $tollFree
     */
    public function withTollFree(TollFree|array $tollFree): self
    {
        $obj = clone $this;
        $obj['tollFree'] = $tollFree;

        return $obj;
    }
}
