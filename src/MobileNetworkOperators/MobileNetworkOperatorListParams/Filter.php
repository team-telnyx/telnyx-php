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
 * @phpstan-type FilterShape = array{
 *   country_code?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   name?: Name|null,
 *   network_preferences_enabled?: bool|null,
 *   tadig?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by exact country_code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

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
    #[Api(optional: true)]
    public ?bool $network_preferences_enabled;

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
        ?string $country_code = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?Name $name = null,
        ?bool $network_preferences_enabled = null,
        ?string $tadig = null,
    ): self {
        $obj = new self;

        null !== $country_code && $obj->country_code = $country_code;
        null !== $mcc && $obj->mcc = $mcc;
        null !== $mnc && $obj->mnc = $mnc;
        null !== $name && $obj->name = $name;
        null !== $network_preferences_enabled && $obj->network_preferences_enabled = $network_preferences_enabled;
        null !== $tadig && $obj->tadig = $tadig;

        return $obj;
    }

    /**
     * Filter by exact country_code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

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
        $obj->network_preferences_enabled = $networkPreferencesEnabled;

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
