<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage\CountryCoverageGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CountryCoverage\CountryCoverageGetResponse\Data\Local;
use Telnyx\CountryCoverage\CountryCoverageGetResponse\Data\TollFree;

/**
 * @phpstan-import-type LocalShape from \Telnyx\CountryCoverage\CountryCoverageGetResponse\Data\Local
 * @phpstan-import-type TollFreeShape from \Telnyx\CountryCoverage\CountryCoverageGetResponse\Data\TollFree
 *
 * @phpstan-type DataShape = array{
 *   code?: string|null,
 *   features?: list<string>|null,
 *   internationalSMS?: bool|null,
 *   inventoryCoverage?: bool|null,
 *   local?: null|Local|LocalShape,
 *   mobile?: array<string,mixed>|null,
 *   national?: array<string,mixed>|null,
 *   numbers?: bool|null,
 *   p2p?: bool|null,
 *   phoneNumberType?: list<string>|null,
 *   quickship?: bool|null,
 *   region?: string|null,
 *   reservable?: bool|null,
 *   sharedCost?: array<string,mixed>|null,
 *   tollFree?: null|TollFree|TollFreeShape,
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
     * @param LocalShape $local
     * @param array<string,mixed> $mobile
     * @param array<string,mixed> $national
     * @param list<string> $phoneNumberType
     * @param array<string,mixed> $sharedCost
     * @param TollFreeShape $tollFree
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
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $features && $self['features'] = $features;
        null !== $internationalSMS && $self['internationalSMS'] = $internationalSMS;
        null !== $inventoryCoverage && $self['inventoryCoverage'] = $inventoryCoverage;
        null !== $local && $self['local'] = $local;
        null !== $mobile && $self['mobile'] = $mobile;
        null !== $national && $self['national'] = $national;
        null !== $numbers && $self['numbers'] = $numbers;
        null !== $p2p && $self['p2p'] = $p2p;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $quickship && $self['quickship'] = $quickship;
        null !== $region && $self['region'] = $region;
        null !== $reservable && $self['reservable'] = $reservable;
        null !== $sharedCost && $self['sharedCost'] = $sharedCost;
        null !== $tollFree && $self['tollFree'] = $tollFree;

        return $self;
    }

    /**
     * Country ISO code.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Set of features supported.
     *
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    public function withInternationalSMS(bool $internationalSMS): self
    {
        $self = clone $this;
        $self['internationalSMS'] = $internationalSMS;

        return $self;
    }

    /**
     * Indicates whether country can be queried with inventory coverage endpoint.
     */
    public function withInventoryCoverage(bool $inventoryCoverage): self
    {
        $self = clone $this;
        $self['inventoryCoverage'] = $inventoryCoverage;

        return $self;
    }

    /**
     * @param LocalShape $local
     */
    public function withLocal(Local|array $local): self
    {
        $self = clone $this;
        $self['local'] = $local;

        return $self;
    }

    /**
     * @param array<string,mixed> $mobile
     */
    public function withMobile(array $mobile): self
    {
        $self = clone $this;
        $self['mobile'] = $mobile;

        return $self;
    }

    /**
     * @param array<string,mixed> $national
     */
    public function withNational(array $national): self
    {
        $self = clone $this;
        $self['national'] = $national;

        return $self;
    }

    public function withNumbers(bool $numbers): self
    {
        $self = clone $this;
        $self['numbers'] = $numbers;

        return $self;
    }

    public function withP2p(bool $p2p): self
    {
        $self = clone $this;
        $self['p2p'] = $p2p;

        return $self;
    }

    /**
     * Phone number type.
     *
     * @param list<string> $phoneNumberType
     */
    public function withPhoneNumberType(array $phoneNumberType): self
    {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Supports quickship.
     */
    public function withQuickship(bool $quickship): self
    {
        $self = clone $this;
        $self['quickship'] = $quickship;

        return $self;
    }

    /**
     * Geographic region (e.g., AMER, EMEA, APAC).
     */
    public function withRegion(?string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * Supports reservable.
     */
    public function withReservable(bool $reservable): self
    {
        $self = clone $this;
        $self['reservable'] = $reservable;

        return $self;
    }

    /**
     * @param array<string,mixed> $sharedCost
     */
    public function withSharedCost(array $sharedCost): self
    {
        $self = clone $this;
        $self['sharedCost'] = $sharedCost;

        return $self;
    }

    /**
     * @param TollFreeShape $tollFree
     */
    public function withTollFree(TollFree|array $tollFree): self
    {
        $self = clone $this;
        $self['tollFree'] = $tollFree;

        return $self;
    }
}
