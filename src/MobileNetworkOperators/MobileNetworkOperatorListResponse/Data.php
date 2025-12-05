<?php

declare(strict_types=1);

namespace Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   country_code?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   name?: string|null,
 *   network_preferences_enabled?: bool|null,
 *   record_type?: string|null,
 *   tadig?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * MCC stands for Mobile Country Code. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api(optional: true)]
    public ?string $mcc;

    /**
     * MNC stands for Mobile Network Code. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Api(optional: true)]
    public ?string $mnc;

    /**
     * The network operator name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Indicate whether the mobile network operator can be set as preferred in the Network Preferences API.
     */
    #[Api(optional: true)]
    public ?bool $network_preferences_enabled;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * TADIG stands for Transferred Account Data Interchange Group. The TADIG code is a unique identifier for network operators in GSM mobile networks.
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
        ?string $id = null,
        ?string $country_code = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?string $name = null,
        ?bool $network_preferences_enabled = null,
        ?string $record_type = null,
        ?string $tadig = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $name && $obj['name'] = $name;
        null !== $network_preferences_enabled && $obj['network_preferences_enabled'] = $network_preferences_enabled;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $tadig && $obj['tadig'] = $tadig;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    /**
     * MCC stands for Mobile Country Code. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withMcc(string $mcc): self
    {
        $obj = clone $this;
        $obj['mcc'] = $mcc;

        return $obj;
    }

    /**
     * MNC stands for Mobile Network Code. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    public function withMnc(string $mnc): self
    {
        $obj = clone $this;
        $obj['mnc'] = $mnc;

        return $obj;
    }

    /**
     * The network operator name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Indicate whether the mobile network operator can be set as preferred in the Network Preferences API.
     */
    public function withNetworkPreferencesEnabled(
        bool $networkPreferencesEnabled
    ): self {
        $obj = clone $this;
        $obj['network_preferences_enabled'] = $networkPreferencesEnabled;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * TADIG stands for Transferred Account Data Interchange Group. The TADIG code is a unique identifier for network operators in GSM mobile networks.
     */
    public function withTadig(string $tadig): self
    {
        $obj = clone $this;
        $obj['tadig'] = $tadig;

        return $obj;
    }
}
