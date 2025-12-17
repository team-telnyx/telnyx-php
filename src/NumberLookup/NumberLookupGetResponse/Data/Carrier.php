<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\Carrier\Type;

/**
 * @phpstan-type CarrierShape = array{
 *   errorCode?: string|null,
 *   mobileCountryCode?: string|null,
 *   mobileNetworkCode?: string|null,
 *   name?: string|null,
 *   normalizedCarrier?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class Carrier implements BaseModel
{
    /** @use SdkModel<CarrierShape> */
    use SdkModel;

    /**
     * Unused.
     */
    #[Optional('error_code', nullable: true)]
    public ?string $errorCode;

    /**
     * Region code that matches the specific country calling code if the requested phone number type is mobile.
     */
    #[Optional('mobile_country_code')]
    public ?string $mobileCountryCode;

    /**
     * National destination code (NDC), with a 0 prefix, if an NDC is found and the requested phone number type is mobile.
     */
    #[Optional('mobile_network_code')]
    public ?string $mobileNetworkCode;

    /**
     * SPID (Service Provider ID) name, if the requested phone number has been ported; otherwise, the name of carrier who owns the phone number block.
     */
    #[Optional]
    public ?string $name;

    /**
     * If known to Telnyx and applicable, the primary network carrier.
     */
    #[Optional('normalized_carrier')]
    public ?string $normalizedCarrier;

    /**
     * A phone number type that identifies the type of service associated with the requested phone number.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
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
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $errorCode = null,
        ?string $mobileCountryCode = null,
        ?string $mobileNetworkCode = null,
        ?string $name = null,
        ?string $normalizedCarrier = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $errorCode && $self['errorCode'] = $errorCode;
        null !== $mobileCountryCode && $self['mobileCountryCode'] = $mobileCountryCode;
        null !== $mobileNetworkCode && $self['mobileNetworkCode'] = $mobileNetworkCode;
        null !== $name && $self['name'] = $name;
        null !== $normalizedCarrier && $self['normalizedCarrier'] = $normalizedCarrier;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Unused.
     */
    public function withErrorCode(?string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * Region code that matches the specific country calling code if the requested phone number type is mobile.
     */
    public function withMobileCountryCode(string $mobileCountryCode): self
    {
        $self = clone $this;
        $self['mobileCountryCode'] = $mobileCountryCode;

        return $self;
    }

    /**
     * National destination code (NDC), with a 0 prefix, if an NDC is found and the requested phone number type is mobile.
     */
    public function withMobileNetworkCode(string $mobileNetworkCode): self
    {
        $self = clone $this;
        $self['mobileNetworkCode'] = $mobileNetworkCode;

        return $self;
    }

    /**
     * SPID (Service Provider ID) name, if the requested phone number has been ported; otherwise, the name of carrier who owns the phone number block.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * If known to Telnyx and applicable, the primary network carrier.
     */
    public function withNormalizedCarrier(string $normalizedCarrier): self
    {
        $self = clone $this;
        $self['normalizedCarrier'] = $normalizedCarrier;

        return $self;
    }

    /**
     * A phone number type that identifies the type of service associated with the requested phone number.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
