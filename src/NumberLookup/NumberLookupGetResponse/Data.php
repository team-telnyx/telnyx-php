<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerName;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Portability;

/**
 * @phpstan-type data_alias = array{
 *   callerName?: CallerName,
 *   carrier?: Carrier,
 *   countryCode?: string,
 *   fraud?: string,
 *   nationalFormat?: string,
 *   phoneNumber?: string,
 *   portability?: Portability,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('caller_name', optional: true)]
    public ?CallerName $callerName;

    #[Api(optional: true)]
    public ?Carrier $carrier;

    /**
     * Region code that matches the specific country calling code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Unused.
     */
    #[Api(optional: true)]
    public ?string $fraud;

    /**
     * Hyphen-separated national number, preceded by the national destination code (NDC), with a 0 prefix, if an NDC is found.
     */
    #[Api('national_format', optional: true)]
    public ?string $nationalFormat;

    /**
     * E164-formatted phone number.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    #[Api(optional: true)]
    public ?Portability $portability;

    /**
     * Identifies the type of record.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

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
        ?CallerName $callerName = null,
        ?Carrier $carrier = null,
        ?string $countryCode = null,
        ?string $fraud = null,
        ?string $nationalFormat = null,
        ?string $phoneNumber = null,
        ?Portability $portability = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $callerName && $obj->callerName = $callerName;
        null !== $carrier && $obj->carrier = $carrier;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $fraud && $obj->fraud = $fraud;
        null !== $nationalFormat && $obj->nationalFormat = $nationalFormat;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $portability && $obj->portability = $portability;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    public function withCallerName(CallerName $callerName): self
    {
        $obj = clone $this;
        $obj->callerName = $callerName;

        return $obj;
    }

    public function withCarrier(Carrier $carrier): self
    {
        $obj = clone $this;
        $obj->carrier = $carrier;

        return $obj;
    }

    /**
     * Region code that matches the specific country calling code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Unused.
     */
    public function withFraud(string $fraud): self
    {
        $obj = clone $this;
        $obj->fraud = $fraud;

        return $obj;
    }

    /**
     * Hyphen-separated national number, preceded by the national destination code (NDC), with a 0 prefix, if an NDC is found.
     */
    public function withNationalFormat(string $nationalFormat): self
    {
        $obj = clone $this;
        $obj->nationalFormat = $nationalFormat;

        return $obj;
    }

    /**
     * E164-formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withPortability(Portability $portability): self
    {
        $obj = clone $this;
        $obj->portability = $portability;

        return $obj;
    }

    /**
     * Identifies the type of record.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
