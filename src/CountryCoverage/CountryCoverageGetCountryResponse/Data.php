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
 *   international_sms?: bool|null,
 *   inventory_coverage?: bool|null,
 *   local?: Local|null,
 *   mobile?: array<string,mixed>|null,
 *   national?: array<string,mixed>|null,
 *   numbers?: bool|null,
 *   p2p?: bool|null,
 *   phone_number_type?: list<string>|null,
 *   quickship?: bool|null,
 *   region?: string|null,
 *   reservable?: bool|null,
 *   shared_cost?: array<string,mixed>|null,
 *   toll_free?: TollFree|null,
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

    #[Optional]
    public ?bool $international_sms;

    /**
     * Indicates whether country can be queried with inventory coverage endpoint.
     */
    #[Optional]
    public ?bool $inventory_coverage;

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
     * @var list<string>|null $phone_number_type
     */
    #[Optional(list: 'string')]
    public ?array $phone_number_type;

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

    /** @var array<string,mixed>|null $shared_cost */
    #[Optional(map: 'mixed')]
    public ?array $shared_cost;

    #[Optional]
    public ?TollFree $toll_free;

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
     *   full_pstn_replacement?: bool|null,
     *   international_sms?: bool|null,
     *   p2p?: bool|null,
     *   quickship?: bool|null,
     *   reservable?: bool|null,
     * } $local
     * @param array<string,mixed> $mobile
     * @param array<string,mixed> $national
     * @param list<string> $phone_number_type
     * @param array<string,mixed> $shared_cost
     * @param TollFree|array{
     *   features?: list<string>|null,
     *   full_pstn_replacement?: bool|null,
     *   international_sms?: bool|null,
     *   p2p?: bool|null,
     *   quickship?: bool|null,
     *   reservable?: bool|null,
     * } $toll_free
     */
    public static function with(
        ?string $code = null,
        ?array $features = null,
        ?bool $international_sms = null,
        ?bool $inventory_coverage = null,
        Local|array|null $local = null,
        ?array $mobile = null,
        ?array $national = null,
        ?bool $numbers = null,
        ?bool $p2p = null,
        ?array $phone_number_type = null,
        ?bool $quickship = null,
        ?string $region = null,
        ?bool $reservable = null,
        ?array $shared_cost = null,
        TollFree|array|null $toll_free = null,
    ): self {
        $obj = new self;

        null !== $code && $obj['code'] = $code;
        null !== $features && $obj['features'] = $features;
        null !== $international_sms && $obj['international_sms'] = $international_sms;
        null !== $inventory_coverage && $obj['inventory_coverage'] = $inventory_coverage;
        null !== $local && $obj['local'] = $local;
        null !== $mobile && $obj['mobile'] = $mobile;
        null !== $national && $obj['national'] = $national;
        null !== $numbers && $obj['numbers'] = $numbers;
        null !== $p2p && $obj['p2p'] = $p2p;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $quickship && $obj['quickship'] = $quickship;
        null !== $region && $obj['region'] = $region;
        null !== $reservable && $obj['reservable'] = $reservable;
        null !== $shared_cost && $obj['shared_cost'] = $shared_cost;
        null !== $toll_free && $obj['toll_free'] = $toll_free;

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
        $obj['international_sms'] = $internationalSMS;

        return $obj;
    }

    /**
     * Indicates whether country can be queried with inventory coverage endpoint.
     */
    public function withInventoryCoverage(bool $inventoryCoverage): self
    {
        $obj = clone $this;
        $obj['inventory_coverage'] = $inventoryCoverage;

        return $obj;
    }

    /**
     * @param Local|array{
     *   features?: list<string>|null,
     *   full_pstn_replacement?: bool|null,
     *   international_sms?: bool|null,
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
        $obj['phone_number_type'] = $phoneNumberType;

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
        $obj['shared_cost'] = $sharedCost;

        return $obj;
    }

    /**
     * @param TollFree|array{
     *   features?: list<string>|null,
     *   full_pstn_replacement?: bool|null,
     *   international_sms?: bool|null,
     *   p2p?: bool|null,
     *   quickship?: bool|null,
     *   reservable?: bool|null,
     * } $tollFree
     */
    public function withTollFree(TollFree|array $tollFree): self
    {
        $obj = clone $this;
        $obj['toll_free'] = $tollFree;

        return $obj;
    }
}
