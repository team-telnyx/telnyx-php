<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerIdentity;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerName;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\EnhancedCallerName;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\NnidOverride;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability;

/**
 * @phpstan-import-type CallerIdentityShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerIdentity
 * @phpstan-import-type CallerNameShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerName
 * @phpstan-import-type CarrierShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier
 * @phpstan-import-type EnhancedCallerNameShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\EnhancedCallerName
 * @phpstan-import-type NnidOverrideShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\NnidOverride
 * @phpstan-import-type PortabilityShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability
 *
 * @phpstan-type DataShape = array{
 *   callerIdentity?: null|CallerIdentity|CallerIdentityShape,
 *   callerName?: null|CallerName|CallerNameShape,
 *   carrier?: null|Carrier|CarrierShape,
 *   countryCode?: string|null,
 *   enhancedCallerName?: null|EnhancedCallerName|EnhancedCallerNameShape,
 *   fraud?: string|null,
 *   nationalFormat?: string|null,
 *   nnidOverride?: null|NnidOverride|NnidOverrideShape,
 *   phoneNumber?: string|null,
 *   portability?: null|Portability|PortabilityShape,
 *   recordType?: string|null,
 *   validNumber?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identity information for the phone number's owner, including name and postal address. Populated when `type=caller-identity` is requested.
     */
    #[Optional('caller_identity')]
    public ?CallerIdentity $callerIdentity;

    #[Optional('caller_name')]
    public ?CallerName $callerName;

    #[Optional]
    public ?Carrier $carrier;

    /**
     * Region code that matches the specific country calling code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * Enhanced caller name for the phone number's owner. Populated when `type=enhanced-caller-name` is requested.
     */
    #[Optional('enhanced_caller_name')]
    public ?EnhancedCallerName $enhancedCallerName;

    /**
     * Unused.
     */
    #[Optional(nullable: true)]
    public ?string $fraud;

    /**
     * Hyphen-separated national number, preceded by the national destination code (NDC), with a 0 prefix, if an NDC is found.
     */
    #[Optional('national_format')]
    public ?string $nationalFormat;

    /**
     * Network number ID (NNID) override for the phone number, when one applies (available only to accounts enabled for NNID); otherwise null.
     */
    #[Optional('nnid_override', nullable: true)]
    public ?NnidOverride $nnidOverride;

    /**
     * E164-formatted phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional]
    public ?Portability $portability;

    /**
     * Identifies the type of record.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Indicates whether the phone number is valid.
     */
    #[Optional('valid_number')]
    public ?bool $validNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|NnidOverride|NnidOverrideShape|null $nnidOverride
     * @param CallerIdentity|CallerIdentityShape|null $callerIdentity
     * @param CallerName|CallerNameShape|null $callerName
     * @param Carrier|CarrierShape|null $carrier
     * @param EnhancedCallerName|EnhancedCallerNameShape|null $enhancedCallerName
     * @param Portability|PortabilityShape|null $portability
     */
    public static function with(
        string|Omitted|null $fraud = Omitted::VALUE,
        Omitted|NnidOverride|array|null $nnidOverride = Omitted::VALUE,
        CallerIdentity|array|null $callerIdentity = null,
        CallerName|array|null $callerName = null,
        Carrier|array|null $carrier = null,
        ?string $countryCode = null,
        EnhancedCallerName|array|null $enhancedCallerName = null,
        ?string $nationalFormat = null,
        ?string $phoneNumber = null,
        Portability|array|null $portability = null,
        ?string $recordType = null,
        ?bool $validNumber = null,
    ): self {
        $self = new self;

        null !== $callerIdentity && $self['callerIdentity'] = $callerIdentity;
        null !== $callerName && $self['callerName'] = $callerName;
        null !== $carrier && $self['carrier'] = $carrier;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $enhancedCallerName && $self['enhancedCallerName'] = $enhancedCallerName;
        Omitted::VALUE !== $fraud && $self['fraud'] = $fraud;
        null !== $nationalFormat && $self['nationalFormat'] = $nationalFormat;
        Omitted::VALUE !== $nnidOverride && $self['nnidOverride'] = $nnidOverride;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $portability && $self['portability'] = $portability;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $validNumber && $self['validNumber'] = $validNumber;

        return $self;
    }

    /**
     * Identity information for the phone number's owner, including name and postal address. Populated when `type=caller-identity` is requested.
     *
     * @param CallerIdentity|CallerIdentityShape $callerIdentity
     */
    public function withCallerIdentity(
        CallerIdentity|array $callerIdentity
    ): self {
        $self = clone $this;
        $self['callerIdentity'] = $callerIdentity;

        return $self;
    }

    /**
     * @param CallerName|CallerNameShape $callerName
     */
    public function withCallerName(CallerName|array $callerName): self
    {
        $self = clone $this;
        $self['callerName'] = $callerName;

        return $self;
    }

    /**
     * @param Carrier|CarrierShape $carrier
     */
    public function withCarrier(Carrier|array $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    /**
     * Region code that matches the specific country calling code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * Enhanced caller name for the phone number's owner. Populated when `type=enhanced-caller-name` is requested.
     *
     * @param EnhancedCallerName|EnhancedCallerNameShape $enhancedCallerName
     */
    public function withEnhancedCallerName(
        EnhancedCallerName|array $enhancedCallerName
    ): self {
        $self = clone $this;
        $self['enhancedCallerName'] = $enhancedCallerName;

        return $self;
    }

    /**
     * Unused.
     */
    public function withFraud(?string $fraud): self
    {
        $self = clone $this;
        $self['fraud'] = $fraud;

        return $self;
    }

    /**
     * Hyphen-separated national number, preceded by the national destination code (NDC), with a 0 prefix, if an NDC is found.
     */
    public function withNationalFormat(string $nationalFormat): self
    {
        $self = clone $this;
        $self['nationalFormat'] = $nationalFormat;

        return $self;
    }

    /**
     * Network number ID (NNID) override for the phone number, when one applies (available only to accounts enabled for NNID); otherwise null.
     *
     * @param NnidOverride|NnidOverrideShape|null $nnidOverride
     */
    public function withNnidOverride(
        NnidOverride|array|null $nnidOverride
    ): self {
        $self = clone $this;
        $self['nnidOverride'] = $nnidOverride;

        return $self;
    }

    /**
     * E164-formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param Portability|PortabilityShape $portability
     */
    public function withPortability(Portability|array $portability): self
    {
        $self = clone $this;
        $self['portability'] = $portability;

        return $self;
    }

    /**
     * Identifies the type of record.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Indicates whether the phone number is valid.
     */
    public function withValidNumber(bool $validNumber): self
    {
        $self = clone $this;
        $self['validNumber'] = $validNumber;

        return $self;
    }
}
