<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier\Type;

/**
 * @phpstan-type CarrierShape = array{
 *   error_code?: string|null,
 *   mobile_country_code?: string|null,
 *   mobile_network_code?: string|null,
 *   name?: string|null,
 *   normalized_carrier?: string|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class Carrier implements BaseModel
{
    /** @use SdkModel<CarrierShape> */
    use SdkModel;

    /**
     * Unused.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $error_code;

    /**
     * Region code that matches the specific country calling code if the requested phone number type is mobile.
     */
    #[Api(optional: true)]
    public ?string $mobile_country_code;

    /**
     * National destination code (NDC), with a 0 prefix, if an NDC is found and the requested phone number type is mobile.
     */
    #[Api(optional: true)]
    public ?string $mobile_network_code;

    /**
     * SPID (Service Provider ID) name, if the requested phone number has been ported; otherwise, the name of carrier who owns the phone number block.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * If known to Telnyx and applicable, the primary network carrier.
     */
    #[Api(optional: true)]
    public ?string $normalized_carrier;

    /**
     * A phone number type that identifies the type of service associated with the requested phone number.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $error_code = null,
        ?string $mobile_country_code = null,
        ?string $mobile_network_code = null,
        ?string $name = null,
        ?string $normalized_carrier = null,
        Type|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $error_code && $obj['error_code'] = $error_code;
        null !== $mobile_country_code && $obj['mobile_country_code'] = $mobile_country_code;
        null !== $mobile_network_code && $obj['mobile_network_code'] = $mobile_network_code;
        null !== $name && $obj['name'] = $name;
        null !== $normalized_carrier && $obj['normalized_carrier'] = $normalized_carrier;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Unused.
     */
    public function withErrorCode(?string $errorCode): self
    {
        $obj = clone $this;
        $obj['error_code'] = $errorCode;

        return $obj;
    }

    /**
     * Region code that matches the specific country calling code if the requested phone number type is mobile.
     */
    public function withMobileCountryCode(string $mobileCountryCode): self
    {
        $obj = clone $this;
        $obj['mobile_country_code'] = $mobileCountryCode;

        return $obj;
    }

    /**
     * National destination code (NDC), with a 0 prefix, if an NDC is found and the requested phone number type is mobile.
     */
    public function withMobileNetworkCode(string $mobileNetworkCode): self
    {
        $obj = clone $this;
        $obj['mobile_network_code'] = $mobileNetworkCode;

        return $obj;
    }

    /**
     * SPID (Service Provider ID) name, if the requested phone number has been ported; otherwise, the name of carrier who owns the phone number block.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * If known to Telnyx and applicable, the primary network carrier.
     */
    public function withNormalizedCarrier(string $normalizedCarrier): self
    {
        $obj = clone $this;
        $obj['normalized_carrier'] = $normalizedCarrier;

        return $obj;
    }

    /**
     * A phone number type that identifies the type of service associated with the requested phone number.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
