<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirCreateLoaParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Third-party reseller / partner managing the enterprise's phone numbers. Omit when the enterprise works directly with Telnyx.
 *
 * @phpstan-type AgentShape = array{
 *   administrativeArea: string,
 *   city: string,
 *   contactEmail: string,
 *   contactName: string,
 *   contactPhone: string,
 *   contactTitle: string,
 *   country: string,
 *   legalName: string,
 *   postalCode: string,
 *   streetAddress: string,
 *   dba?: string|null,
 *   extendedAddress?: string|null,
 * }
 */
final class Agent implements BaseModel
{
    /** @use SdkModel<AgentShape> */
    use SdkModel;

    #[Required('administrative_area')]
    public string $administrativeArea;

    #[Required]
    public string $city;

    #[Required('contact_email')]
    public string $contactEmail;

    #[Required('contact_name')]
    public string $contactName;

    #[Required('contact_phone')]
    public string $contactPhone;

    #[Required('contact_title')]
    public string $contactTitle;

    #[Required]
    public string $country;

    #[Required('legal_name')]
    public string $legalName;

    #[Required('postal_code')]
    public string $postalCode;

    #[Required('street_address')]
    public string $streetAddress;

    #[Optional(nullable: true)]
    public ?string $dba;

    #[Optional('extended_address', nullable: true)]
    public ?string $extendedAddress;

    /**
     * `new Agent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Agent::with(
     *   administrativeArea: ...,
     *   city: ...,
     *   contactEmail: ...,
     *   contactName: ...,
     *   contactPhone: ...,
     *   contactTitle: ...,
     *   country: ...,
     *   legalName: ...,
     *   postalCode: ...,
     *   streetAddress: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Agent)
     *   ->withAdministrativeArea(...)
     *   ->withCity(...)
     *   ->withContactEmail(...)
     *   ->withContactName(...)
     *   ->withContactPhone(...)
     *   ->withContactTitle(...)
     *   ->withCountry(...)
     *   ->withLegalName(...)
     *   ->withPostalCode(...)
     *   ->withStreetAddress(...)
     * ```
     */
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
        string $administrativeArea,
        string $city,
        string $contactEmail,
        string $contactName,
        string $contactPhone,
        string $contactTitle,
        string $country,
        string $legalName,
        string $postalCode,
        string $streetAddress,
        ?string $dba = null,
        ?string $extendedAddress = null,
    ): self {
        $self = new self;

        $self['administrativeArea'] = $administrativeArea;
        $self['city'] = $city;
        $self['contactEmail'] = $contactEmail;
        $self['contactName'] = $contactName;
        $self['contactPhone'] = $contactPhone;
        $self['contactTitle'] = $contactTitle;
        $self['country'] = $country;
        $self['legalName'] = $legalName;
        $self['postalCode'] = $postalCode;
        $self['streetAddress'] = $streetAddress;

        null !== $dba && $self['dba'] = $dba;
        null !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    public function withContactEmail(string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

        return $self;
    }

    public function withContactName(string $contactName): self
    {
        $self = clone $this;
        $self['contactName'] = $contactName;

        return $self;
    }

    public function withContactPhone(string $contactPhone): self
    {
        $self = clone $this;
        $self['contactPhone'] = $contactPhone;

        return $self;
    }

    public function withContactTitle(string $contactTitle): self
    {
        $self = clone $this;
        $self['contactTitle'] = $contactTitle;

        return $self;
    }

    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withLegalName(string $legalName): self
    {
        $self = clone $this;
        $self['legalName'] = $legalName;

        return $self;
    }

    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }

    public function withDba(?string $dba): self
    {
        $self = clone $this;
        $self['dba'] = $dba;

        return $self;
    }

    public function withExtendedAddress(?string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }
}
