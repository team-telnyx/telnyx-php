<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerIdentity\Address;

/**
 * Identity information for the phone number's owner, including name and postal address. Populated when `type=caller-identity` is requested.
 *
 * @phpstan-import-type AddressShape from \Telnyx\NumberLookup\NumberLookupGetResponse\Data\CallerIdentity\Address
 *
 * @phpstan-type CallerIdentityShape = array{
 *   address?: null|Address|AddressShape,
 *   confidenceScore?: float|null,
 *   errorCode?: string|null,
 *   name?: string|null,
 * }
 */
final class CallerIdentity implements BaseModel
{
    /** @use SdkModel<CallerIdentityShape> */
    use SdkModel;

    /**
     * Postal address associated with the phone number's owner.
     */
    #[Optional]
    public ?Address $address;

    /**
     * How strongly the phone number is linked to the returned name, on a scale of 50 to 90 (higher means more supporting signals). Reflects signal strength, not probability: 70 indicates stronger, more consistent evidence than 60, not a 70% chance of being correct. As a guide, 70+ is high confidence, 60 moderate, and 50 limited. Below 50 no name is returned, so scores under 50 are never present.
     */
    #[Optional('confidence_score', nullable: true)]
    public ?float $confidenceScore;

    /**
     * A lookup-specific error code if the identity could not be resolved; otherwise null.
     */
    #[Optional('error_code', nullable: true)]
    public ?string $errorCode;

    /**
     * The name associated with the phone number.
     */
    #[Optional(nullable: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Address|AddressShape|null $address
     */
    public static function with(
        float|Omitted|null $confidenceScore = Omitted::VALUE,
        string|Omitted|null $errorCode = Omitted::VALUE,
        string|Omitted|null $name = Omitted::VALUE,
        Address|array|null $address = null,
    ): self {
        $self = new self;

        null !== $address && $self['address'] = $address;
        Omitted::VALUE !== $confidenceScore && $self['confidenceScore'] = $confidenceScore;
        Omitted::VALUE !== $errorCode && $self['errorCode'] = $errorCode;
        Omitted::VALUE !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Postal address associated with the phone number's owner.
     *
     * @param Address|AddressShape $address
     */
    public function withAddress(Address|array $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * How strongly the phone number is linked to the returned name, on a scale of 50 to 90 (higher means more supporting signals). Reflects signal strength, not probability: 70 indicates stronger, more consistent evidence than 60, not a 70% chance of being correct. As a guide, 70+ is high confidence, 60 moderate, and 50 limited. Below 50 no name is returned, so scores under 50 are never present.
     */
    public function withConfidenceScore(?float $confidenceScore): self
    {
        $self = clone $this;
        $self['confidenceScore'] = $confidenceScore;

        return $self;
    }

    /**
     * A lookup-specific error code if the identity could not be resolved; otherwise null.
     */
    public function withErrorCode(?string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * The name associated with the phone number.
     */
    public function withName(?string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
