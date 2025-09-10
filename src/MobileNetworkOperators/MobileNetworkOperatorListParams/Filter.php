<?php

declare(strict_types=1);

namespace Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter\Name;

/**
 * Consolidated filter parameter for mobile network operators (deepObject style). Originally: filter[name][starts_with], filter[name][contains], filter[name][ends_with], filter[country_code], filter[mcc], filter[mnc], filter[tadig], filter[network_preferences_enabled].
 *
 * @phpstan-type filter_alias = array{
 *   countryCode?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   name?: Name|null,
 *   networkPreferencesEnabled?: bool|null,
 *   tadig?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by exact country_code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Filter by exact MCC.
     */
    #[Api(optional: true)]
    public ?string $mcc;

    /**
     * Filter by exact MNC.
     */
    #[Api(optional: true)]
    public ?string $mnc;

    /**
     * Advanced name filtering operations.
     */
    #[Api(optional: true)]
    public ?Name $name;

    /**
     * Filter by network_preferences_enabled.
     */
    #[Api('network_preferences_enabled', optional: true)]
    public ?bool $networkPreferencesEnabled;

    /**
     * Filter by exact TADIG.
     */
    #[Api(optional: true)]
    public ?string $tadig;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $countryCode = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?Name $name = null,
        ?bool $networkPreferencesEnabled = null,
        ?string $tadig = null,
    ): self {
        $obj = new self;

        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $mcc && $obj->mcc = $mcc;
        null !== $mnc && $obj->mnc = $mnc;
        null !== $name && $obj->name = $name;
        null !== $networkPreferencesEnabled && $obj->networkPreferencesEnabled = $networkPreferencesEnabled;
        null !== $tadig && $obj->tadig = $tadig;

        return $obj;
    }

    /**
     * Filter by exact country_code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Filter by exact MCC.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj->mcc = $mcc;

        return $obj;
    }

    /**
     * Filter by exact MNC.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj->mnc = $mnc;

        return $obj;
    }

    /**
     * Advanced name filtering operations.
     */
    public function withName(Name $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Filter by network_preferences_enabled.
     */
    public function withNetworkPreferencesEnabled(
        bool $networkPreferencesEnabled
    ): self {
        $obj = clone $this;
        $obj->networkPreferencesEnabled = $networkPreferencesEnabled;

        return $obj;
    }

    /**
     * Filter by exact TADIG.
     */
    public function withTadig(string $tadig): self
    {
        $obj = clone $this;
        $obj->tadig = $tadig;

        return $obj;
    }
}
