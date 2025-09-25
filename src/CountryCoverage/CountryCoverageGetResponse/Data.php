<?php

declare(strict_types=1);

namespace Telnyx\CountryCoverage\CountryCoverageGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CountryCoverage\CountryCoverageGetResponse\Data\Local;
use Telnyx\CountryCoverage\CountryCoverageGetResponse\Data\TollFree;

/**
 * @phpstan-type data_alias = array{
 *   code?: string,
 *   features?: list<string>,
 *   internationalSMS?: bool,
 *   inventoryCoverage?: bool,
 *   local?: Local,
 *   mobile?: array<string, mixed>,
 *   national?: array<string, mixed>,
 *   numbers?: bool,
 *   p2p?: bool,
 *   phoneNumberType?: list<string>,
 *   quickship?: bool,
 *   region?: string|null,
 *   reservable?: bool,
 *   sharedCost?: array<string, mixed>,
 *   tollFree?: TollFree,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Country ISO code.
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * Set of features supported.
     *
     * @var list<string>|null $features
     */
    #[Api(list: 'string', optional: true)]
    public ?array $features;

    #[Api('international_sms', optional: true)]
    public ?bool $internationalSMS;

    /**
     * Indicates whether country can be queried with inventory coverage endpoint.
     */
    #[Api('inventory_coverage', optional: true)]
    public ?bool $inventoryCoverage;

    #[Api(optional: true)]
    public ?Local $local;

    /** @var array<string, mixed>|null $mobile */
    #[Api(map: 'mixed', optional: true)]
    public ?array $mobile;

    /** @var array<string, mixed>|null $national */
    #[Api(map: 'mixed', optional: true)]
    public ?array $national;

    #[Api(optional: true)]
    public ?bool $numbers;

    #[Api(optional: true)]
    public ?bool $p2p;

    /**
     * Phone number type.
     *
     * @var list<string>|null $phoneNumberType
     */
    #[Api('phone_number_type', list: 'string', optional: true)]
    public ?array $phoneNumberType;

    /**
     * Supports quickship.
     */
    #[Api(optional: true)]
    public ?bool $quickship;

    /**
     * Geographic region (e.g., AMER, EMEA, APAC).
     */
    #[Api(nullable: true, optional: true)]
    public ?string $region;

    /**
     * Supports reservable.
     */
    #[Api(optional: true)]
    public ?bool $reservable;

    /** @var array<string, mixed>|null $sharedCost */
    #[Api('shared_cost', map: 'mixed', optional: true)]
    public ?array $sharedCost;

    #[Api('toll_free', optional: true)]
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
     * @param array<string, mixed> $mobile
     * @param array<string, mixed> $national
     * @param list<string> $phoneNumberType
     * @param array<string, mixed> $sharedCost
     */
    public static function with(
        ?string $code = null,
        ?array $features = null,
        ?bool $internationalSMS = null,
        ?bool $inventoryCoverage = null,
        ?Local $local = null,
        ?array $mobile = null,
        ?array $national = null,
        ?bool $numbers = null,
        ?bool $p2p = null,
        ?array $phoneNumberType = null,
        ?bool $quickship = null,
        ?string $region = null,
        ?bool $reservable = null,
        ?array $sharedCost = null,
        ?TollFree $tollFree = null,
    ): self {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $features && $obj->features = $features;
        null !== $internationalSMS && $obj->internationalSMS = $internationalSMS;
        null !== $inventoryCoverage && $obj->inventoryCoverage = $inventoryCoverage;
        null !== $local && $obj->local = $local;
        null !== $mobile && $obj->mobile = $mobile;
        null !== $national && $obj->national = $national;
        null !== $numbers && $obj->numbers = $numbers;
        null !== $p2p && $obj->p2p = $p2p;
        null !== $phoneNumberType && $obj->phoneNumberType = $phoneNumberType;
        null !== $quickship && $obj->quickship = $quickship;
        null !== $region && $obj->region = $region;
        null !== $reservable && $obj->reservable = $reservable;
        null !== $sharedCost && $obj->sharedCost = $sharedCost;
        null !== $tollFree && $obj->tollFree = $tollFree;

        return $obj;
    }

    /**
     * Country ISO code.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

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
        $obj->features = $features;

        return $obj;
    }

    public function withInternationalSMS(bool $internationalSMS): self
    {
        $obj = clone $this;
        $obj->internationalSMS = $internationalSMS;

        return $obj;
    }

    /**
     * Indicates whether country can be queried with inventory coverage endpoint.
     */
    public function withInventoryCoverage(bool $inventoryCoverage): self
    {
        $obj = clone $this;
        $obj->inventoryCoverage = $inventoryCoverage;

        return $obj;
    }

    public function withLocal(Local $local): self
    {
        $obj = clone $this;
        $obj->local = $local;

        return $obj;
    }

    /**
     * @param array<string, mixed> $mobile
     */
    public function withMobile(array $mobile): self
    {
        $obj = clone $this;
        $obj->mobile = $mobile;

        return $obj;
    }

    /**
     * @param array<string, mixed> $national
     */
    public function withNational(array $national): self
    {
        $obj = clone $this;
        $obj->national = $national;

        return $obj;
    }

    public function withNumbers(bool $numbers): self
    {
        $obj = clone $this;
        $obj->numbers = $numbers;

        return $obj;
    }

    public function withP2p(bool $p2p): self
    {
        $obj = clone $this;
        $obj->p2p = $p2p;

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
        $obj->phoneNumberType = $phoneNumberType;

        return $obj;
    }

    /**
     * Supports quickship.
     */
    public function withQuickship(bool $quickship): self
    {
        $obj = clone $this;
        $obj->quickship = $quickship;

        return $obj;
    }

    /**
     * Geographic region (e.g., AMER, EMEA, APAC).
     */
    public function withRegion(?string $region): self
    {
        $obj = clone $this;
        $obj->region = $region;

        return $obj;
    }

    /**
     * Supports reservable.
     */
    public function withReservable(bool $reservable): self
    {
        $obj = clone $this;
        $obj->reservable = $reservable;

        return $obj;
    }

    /**
     * @param array<string, mixed> $sharedCost
     */
    public function withSharedCost(array $sharedCost): self
    {
        $obj = clone $this;
        $obj->sharedCost = $sharedCost;

        return $obj;
    }

    public function withTollFree(TollFree $tollFree): self
    {
        $obj = clone $this;
        $obj->tollFree = $tollFree;

        return $obj;
    }
}
