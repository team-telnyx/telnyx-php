<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerName;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability;

/**
 * @phpstan-import-type CallerNameShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerName
 * @phpstan-import-type CarrierShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier
 * @phpstan-import-type PortabilityShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability
 *
 * @phpstan-type DataShape = array{
 *   callerName?: null|CallerName|CallerNameShape,
 *   carrier?: null|Carrier|CarrierShape,
 *   countryCode?: string|null,
 *   fraud?: string|null,
 *   nationalFormat?: string|null,
 *   phoneNumber?: string|null,
 *   portability?: null|Portability|PortabilityShape,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

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

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallerNameShape $callerName
     * @param CarrierShape $carrier
     * @param PortabilityShape $portability
     */
    public static function with(
        CallerName|array|null $callerName = null,
        Carrier|array|null $carrier = null,
        ?string $countryCode = null,
        ?string $fraud = null,
        ?string $nationalFormat = null,
        ?string $phoneNumber = null,
        Portability|array|null $portability = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $callerName && $self['callerName'] = $callerName;
        null !== $carrier && $self['carrier'] = $carrier;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $fraud && $self['fraud'] = $fraud;
        null !== $nationalFormat && $self['nationalFormat'] = $nationalFormat;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $portability && $self['portability'] = $portability;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param CallerNameShape $callerName
     */
    public function withCallerName(CallerName|array $callerName): self
    {
        $self = clone $this;
        $self['callerName'] = $callerName;

        return $self;
    }

    /**
     * @param CarrierShape $carrier
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
     * E164-formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * @param PortabilityShape $portability
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
}
