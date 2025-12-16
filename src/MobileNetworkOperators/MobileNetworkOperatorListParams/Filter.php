<?php

declare(strict_types=1);

namespace Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter\Name;

/**
 * Consolidated filter parameter for mobile network operators (deepObject style). Originally: filter[name][starts_with], filter[name][contains], filter[name][ends_with], filter[country_code], filter[mcc], filter[mnc], filter[tadig], filter[network_preferences_enabled].
 *
 * @phpstan-import-type NameShape from \Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter\Name
 *
 * @phpstan-type FilterShape = array{
 *   countryCode?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   name?: null|Name|NameShape,
 *   networkPreferencesEnabled?: bool|null,
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
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Filter by exact MCC.
     */
    #[Optional]
    public ?string $mcc;

    /**
     * Filter by exact MNC.
     */
    #[Optional]
    public ?string $mnc;

    /**
     * Advanced name filtering operations.
     */
    #[Optional]
    public ?Name $name;

    /**
     * Filter by network_preferences_enabled.
     */
    #[Optional('network_preferences_enabled')]
    public ?bool $networkPreferencesEnabled;

    /**
     * Filter by exact TADIG.
     */
    #[Optional]
    public ?string $tadig;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NameShape $name
     */
    public static function with(
        ?string $countryCode = null,
        ?string $mcc = null,
        ?string $mnc = null,
        Name|array|null $name = null,
        ?bool $networkPreferencesEnabled = null,
        ?string $tadig = null,
    ): self {
        $self = new self;

        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $mcc && $self['mcc'] = $mcc;
        null !== $mnc && $self['mnc'] = $mnc;
        null !== $name && $self['name'] = $name;
        null !== $networkPreferencesEnabled && $self['networkPreferencesEnabled'] = $networkPreferencesEnabled;
        null !== $tadig && $self['tadig'] = $tadig;

        return $self;
    }

    /**
     * Filter by exact country_code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Filter by exact MCC.
     */
    public function withMcc(string $mcc): self
    {
        $self = clone $this;
        $self['mcc'] = $mcc;

        return $self;
    }

    /**
     * Filter by exact MNC.
     */
    public function withMnc(string $mnc): self
    {
        $self = clone $this;
        $self['mnc'] = $mnc;

        return $self;
    }

    /**
     * Advanced name filtering operations.
     *
     * @param NameShape $name
     */
    public function withName(Name|array $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Filter by network_preferences_enabled.
     */
    public function withNetworkPreferencesEnabled(
        bool $networkPreferencesEnabled
    ): self {
        $self = clone $this;
        $self['networkPreferencesEnabled'] = $networkPreferencesEnabled;

        return $self;
    }

    /**
     * Filter by exact TADIG.
     */
    public function withTadig(string $tadig): self
    {
        $self = clone $this;
        $self['tadig'] = $tadig;

        return $self;
    }
}
