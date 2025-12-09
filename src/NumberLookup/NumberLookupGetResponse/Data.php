<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerName;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier\Type;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability\PortedStatus;

/**
 * @phpstan-type DataShape = array{
 *   callerName?: CallerName|null,
 *   carrier?: Carrier|null,
 *   countryCode?: string|null,
 *   fraud?: string|null,
 *   nationalFormat?: string|null,
 *   phoneNumber?: string|null,
 *   portability?: Portability|null,
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
     * @param CallerName|array{
     *   callerName?: string|null, errorCode?: string|null
     * } $callerName
     * @param Carrier|array{
     *   errorCode?: string|null,
     *   mobileCountryCode?: string|null,
     *   mobileNetworkCode?: string|null,
     *   name?: string|null,
     *   normalizedCarrier?: string|null,
     *   type?: value-of<Type>|null,
     * } $carrier
     * @param Portability|array{
     *   altspid?: string|null,
     *   altspidCarrierName?: string|null,
     *   altspidCarrierType?: string|null,
     *   city?: string|null,
     *   lineType?: string|null,
     *   lrn?: string|null,
     *   ocn?: string|null,
     *   portedDate?: string|null,
     *   portedStatus?: value-of<PortedStatus>|null,
     *   spid?: string|null,
     *   spidCarrierName?: string|null,
     *   spidCarrierType?: string|null,
     *   state?: string|null,
     * } $portability
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
     * @param CallerName|array{
     *   callerName?: string|null, errorCode?: string|null
     * } $callerName
     */
    public function withCallerName(CallerName|array $callerName): self
    {
        $self = clone $this;
        $self['callerName'] = $callerName;

        return $self;
    }

    /**
     * @param Carrier|array{
     *   errorCode?: string|null,
     *   mobileCountryCode?: string|null,
     *   mobileNetworkCode?: string|null,
     *   name?: string|null,
     *   normalizedCarrier?: string|null,
     *   type?: value-of<Type>|null,
     * } $carrier
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
     * @param Portability|array{
     *   altspid?: string|null,
     *   altspidCarrierName?: string|null,
     *   altspidCarrierType?: string|null,
     *   city?: string|null,
     *   lineType?: string|null,
     *   lrn?: string|null,
     *   ocn?: string|null,
     *   portedDate?: string|null,
     *   portedStatus?: value-of<PortedStatus>|null,
     *   spid?: string|null,
     *   spidCarrierName?: string|null,
     *   spidCarrierType?: string|null,
     *   state?: string|null,
     * } $portability
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
