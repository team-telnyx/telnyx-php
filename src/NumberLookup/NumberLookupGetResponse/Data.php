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
 * @phpstan-type DataShape = array{
 *   caller_name?: CallerName|null,
 *   carrier?: Carrier|null,
 *   country_code?: string|null,
 *   fraud?: string|null,
 *   national_format?: string|null,
 *   phone_number?: string|null,
 *   portability?: Portability|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CallerName $caller_name;

    #[Api(optional: true)]
    public ?Carrier $carrier;

    /**
     * Region code that matches the specific country calling code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * Unused.
     */
    #[Api(optional: true)]
    public ?string $fraud;

    /**
     * Hyphen-separated national number, preceded by the national destination code (NDC), with a 0 prefix, if an NDC is found.
     */
    #[Api(optional: true)]
    public ?string $national_format;

    /**
     * E164-formatted phone number.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    #[Api(optional: true)]
    public ?Portability $portability;

    /**
     * Identifies the type of record.
     */
    #[Api(optional: true)]
    public ?string $record_type;

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
        ?CallerName $caller_name = null,
        ?Carrier $carrier = null,
        ?string $country_code = null,
        ?string $fraud = null,
        ?string $national_format = null,
        ?string $phone_number = null,
        ?Portability $portability = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $caller_name && $obj->caller_name = $caller_name;
        null !== $carrier && $obj->carrier = $carrier;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $fraud && $obj->fraud = $fraud;
        null !== $national_format && $obj->national_format = $national_format;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $portability && $obj->portability = $portability;
        null !== $record_type && $obj->record_type = $record_type;

        return $obj;
    }

    public function withCallerName(CallerName $callerName): self
    {
        $obj = clone $this;
        $obj->caller_name = $callerName;

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
        $obj->country_code = $countryCode;

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
        $obj->national_format = $nationalFormat;

        return $obj;
    }

    /**
     * E164-formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

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
        $obj->record_type = $recordType;

        return $obj;
    }
}
