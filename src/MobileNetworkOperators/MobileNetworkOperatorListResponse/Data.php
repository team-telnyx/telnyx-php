<?php

declare(strict_types=1);

namespace Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   countryCode?: string|null,
 *   mcc?: string|null,
 *   mnc?: string|null,
 *   name?: string|null,
 *   networkPreferencesEnabled?: bool|null,
 *   recordType?: string|null,
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
    #[Optional]
    public ?string $id;

    /**
     * The mobile operator two-character (ISO 3166-1 alpha-2) origin country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * MCC stands for Mobile Country Code. It's a three decimal digit that identifies a country.<br/><br/>
     * This code is commonly seen joined with a Mobile Network Code (MNC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Optional]
    public ?string $mcc;

    /**
     * MNC stands for Mobile Network Code. It's a two to three decimal digits that identify a network.<br/><br/>
     *  This code is commonly seen joined with a Mobile Country Code (MCC) in a tuple that allows identifying a carrier known as PLMN (Public Land Mobile Network) code.
     */
    #[Optional]
    public ?string $mnc;

    /**
     * The network operator name.
     */
    #[Optional]
    public ?string $name;

    /**
     * Indicate whether the mobile network operator can be set as preferred in the Network Preferences API.
     */
    #[Optional('network_preferences_enabled')]
    public ?bool $networkPreferencesEnabled;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * TADIG stands for Transferred Account Data Interchange Group. The TADIG code is a unique identifier for network operators in GSM mobile networks.
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
     */
    public static function with(
        ?string $id = null,
        ?string $countryCode = null,
        ?string $mcc = null,
        ?string $mnc = null,
        ?string $name = null,
        ?bool $networkPreferencesEnabled = null,
        ?string $recordType = null,
        ?string $tadig = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $mcc && $obj['mcc'] = $mcc;
        null !== $mnc && $obj['mnc'] = $mnc;
        null !== $name && $obj['name'] = $name;
        null !== $networkPreferencesEnabled && $obj['networkPreferencesEnabled'] = $networkPreferencesEnabled;
        null !== $recordType && $obj['recordType'] = $recordType;
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
        $obj['countryCode'] = $countryCode;

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
        $obj['networkPreferencesEnabled'] = $networkPreferencesEnabled;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

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
