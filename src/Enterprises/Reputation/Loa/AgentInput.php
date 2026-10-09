<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Loa;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Third-party reseller / partner managing the enterprise's phone numbers. Omit when the enterprise works directly with Telnyx.
 *
 * @phpstan-type AgentInputShape = array{
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
final class AgentInput implements BaseModel
{
    /** @use SdkModel<AgentInputShape> */
    use SdkModel;

    /**
     * The state or province of the partner's address, as its code, for example IL or ON.
     */
    #[Required('administrative_area')]
    public string $administrativeArea;

    /**
     * The city of the partner's address.
     */
    #[Required]
    public string $city;

    /**
     * The email address of the contact person at the partner.
     */
    #[Required('contact_email')]
    public string $contactEmail;

    /**
     * The name of a contact person at the partner.
     */
    #[Required('contact_name')]
    public string $contactName;

    /**
     * The phone number of the contact person at the partner, in E.164 format, for example +13125550000.
     */
    #[Required('contact_phone')]
    public string $contactPhone;

    /**
     * The job title of the contact person at the partner.
     */
    #[Required('contact_title')]
    public string $contactTitle;

    /**
     * The two-letter country code of the partner's address, for example US.
     */
    #[Required]
    public string $country;

    /**
     * The legal name of the third-party partner or reseller managing these numbers on your behalf.
     */
    #[Required('legal_name')]
    public string $legalName;

    /**
     * The postal or ZIP code of the partner's address.
     */
    #[Required('postal_code')]
    public string $postalCode;

    /**
     * The street address of the partner, including the building number and street name.
     */
    #[Required('street_address')]
    public string $streetAddress;

    /**
     * The trade name (Doing Business As) the partner operates under, if different from its legal name. Leave blank if it does not apply.
     */
    #[Optional(nullable: true)]
    public ?string $dba;

    /**
     * An optional second address line for the partner, such as a suite, unit, or floor. Leave blank if it does not apply.
     */
    #[Optional('extended_address', nullable: true)]
    public ?string $extendedAddress;

    /**
     * `new AgentInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentInput::with(
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
     * (new AgentInput)
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
        string|Omitted|null $dba = Omitted::VALUE,
        string|Omitted|null $extendedAddress = Omitted::VALUE,
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

        Omitted::VALUE !== $dba && $self['dba'] = $dba;
        Omitted::VALUE !== $extendedAddress && $self['extendedAddress'] = $extendedAddress;

        return $self;
    }

    /**
     * The state or province of the partner's address, as its code, for example IL or ON.
     */
    public function withAdministrativeArea(string $administrativeArea): self
    {
        $self = clone $this;
        $self['administrativeArea'] = $administrativeArea;

        return $self;
    }

    /**
     * The city of the partner's address.
     */
    public function withCity(string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * The email address of the contact person at the partner.
     */
    public function withContactEmail(string $contactEmail): self
    {
        $self = clone $this;
        $self['contactEmail'] = $contactEmail;

        return $self;
    }

    /**
     * The name of a contact person at the partner.
     */
    public function withContactName(string $contactName): self
    {
        $self = clone $this;
        $self['contactName'] = $contactName;

        return $self;
    }

    /**
     * The phone number of the contact person at the partner, in E.164 format, for example +13125550000.
     */
    public function withContactPhone(string $contactPhone): self
    {
        $self = clone $this;
        $self['contactPhone'] = $contactPhone;

        return $self;
    }

    /**
     * The job title of the contact person at the partner.
     */
    public function withContactTitle(string $contactTitle): self
    {
        $self = clone $this;
        $self['contactTitle'] = $contactTitle;

        return $self;
    }

    /**
     * The two-letter country code of the partner's address, for example US.
     */
    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * The legal name of the third-party partner or reseller managing these numbers on your behalf.
     */
    public function withLegalName(string $legalName): self
    {
        $self = clone $this;
        $self['legalName'] = $legalName;

        return $self;
    }

    /**
     * The postal or ZIP code of the partner's address.
     */
    public function withPostalCode(string $postalCode): self
    {
        $self = clone $this;
        $self['postalCode'] = $postalCode;

        return $self;
    }

    /**
     * The street address of the partner, including the building number and street name.
     */
    public function withStreetAddress(string $streetAddress): self
    {
        $self = clone $this;
        $self['streetAddress'] = $streetAddress;

        return $self;
    }

    /**
     * The trade name (Doing Business As) the partner operates under, if different from its legal name. Leave blank if it does not apply.
     */
    public function withDba(?string $dba): self
    {
        $self = clone $this;
        $self['dba'] = $dba;

        return $self;
    }

    /**
     * An optional second address line for the partner, such as a suite, unit, or floor. Leave blank if it does not apply.
     */
    public function withExtendedAddress(?string $extendedAddress): self
    {
        $self = clone $this;
        $self['extendedAddress'] = $extendedAddress;

        return $self;
    }
}
