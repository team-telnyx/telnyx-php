<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Brands\BrandCreateParams\Contacts;
use Telnyx\Rcs\Brands\BrandCreateParams\Identifiers;

/**
 * Creates an editable RCS brand draft. Creating the draft does not begin external review.
 *
 * @see Telnyx\Services\Rcs\BrandsService::create()
 *
 * @phpstan-import-type BrandAddressShape from \Telnyx\Rcs\Brands\BrandAddress
 * @phpstan-import-type ContactsShape from \Telnyx\Rcs\Brands\BrandCreateParams\Contacts
 * @phpstan-import-type IdentifiersShape from \Telnyx\Rcs\Brands\BrandCreateParams\Identifiers
 *
 * @phpstan-type BrandCreateParamsShape = array{
 *   addresses: array<string,BrandAddress|BrandAddressShape>,
 *   contacts: Contacts|ContactsShape,
 *   displayName: string,
 *   identifiers: Identifiers|IdentifiersShape,
 *   legalEntityType: BrandLegalEntityType|value-of<BrandLegalEntityType>,
 *   legalName: string,
 *   organizationType: BrandOrganizationType|value-of<BrandOrganizationType>,
 *   websiteURL: string,
 *   profileID?: string|null,
 * }
 */
final class BrandCreateParams implements BaseModel
{
    /** @use SdkModel<BrandCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,BrandAddress> $addresses */
    #[Required(map: BrandAddress::class)]
    public array $addresses;

    /**
     * Named business contacts. Use the `brand` key for the required BRAND contact.
     */
    #[Required]
    public Contacts $contacts;

    #[Required('display_name')]
    public string $displayName;

    /**
     * Named business identifiers. Use the `ein` key for the required EIN and `stock_symbol` for a public-profit brand's stock symbol.
     */
    #[Required]
    public Identifiers $identifiers;

    /** @var value-of<BrandLegalEntityType> $legalEntityType */
    #[Required('legal_entity_type', enum: BrandLegalEntityType::class)]
    public string $legalEntityType;

    #[Required('legal_name')]
    public string $legalName;

    /** @var value-of<BrandOrganizationType> $organizationType */
    #[Required('organization_type', enum: BrandOrganizationType::class)]
    public string $organizationType;

    #[Required('website_url')]
    public string $websiteURL;

    /**
     * A Messaging Profile owned by the authenticated organization. Agents inherit this value when they do not provide their own profile.
     */
    #[Optional('profile_id', nullable: true)]
    public ?string $profileID;

    /**
     * `new BrandCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandCreateParams::with(
     *   addresses: ...,
     *   contacts: ...,
     *   displayName: ...,
     *   identifiers: ...,
     *   legalEntityType: ...,
     *   legalName: ...,
     *   organizationType: ...,
     *   websiteURL: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandCreateParams)
     *   ->withAddresses(...)
     *   ->withContacts(...)
     *   ->withDisplayName(...)
     *   ->withIdentifiers(...)
     *   ->withLegalEntityType(...)
     *   ->withLegalName(...)
     *   ->withOrganizationType(...)
     *   ->withWebsiteURL(...)
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
     *
     * @param array<string,BrandAddress|BrandAddressShape> $addresses
     * @param Contacts|ContactsShape $contacts
     * @param Identifiers|IdentifiersShape $identifiers
     * @param BrandLegalEntityType|value-of<BrandLegalEntityType> $legalEntityType
     * @param BrandOrganizationType|value-of<BrandOrganizationType> $organizationType
     */
    public static function with(
        array $addresses,
        Contacts|array $contacts,
        string $displayName,
        Identifiers|array $identifiers,
        BrandLegalEntityType|string $legalEntityType,
        string $legalName,
        BrandOrganizationType|string $organizationType,
        string $websiteURL,
        ?string $profileID = null,
    ): self {
        $self = new self;

        $self['addresses'] = $addresses;
        $self['contacts'] = $contacts;
        $self['displayName'] = $displayName;
        $self['identifiers'] = $identifiers;
        $self['legalEntityType'] = $legalEntityType;
        $self['legalName'] = $legalName;
        $self['organizationType'] = $organizationType;
        $self['websiteURL'] = $websiteURL;

        null !== $profileID && $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * @param array<string,BrandAddress|BrandAddressShape> $addresses
     */
    public function withAddresses(array $addresses): self
    {
        $self = clone $this;
        $self['addresses'] = $addresses;

        return $self;
    }

    /**
     * Named business contacts. Use the `brand` key for the required BRAND contact.
     *
     * @param Contacts|ContactsShape $contacts
     */
    public function withContacts(Contacts|array $contacts): self
    {
        $self = clone $this;
        $self['contacts'] = $contacts;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    /**
     * Named business identifiers. Use the `ein` key for the required EIN and `stock_symbol` for a public-profit brand's stock symbol.
     *
     * @param Identifiers|IdentifiersShape $identifiers
     */
    public function withIdentifiers(Identifiers|array $identifiers): self
    {
        $self = clone $this;
        $self['identifiers'] = $identifiers;

        return $self;
    }

    /**
     * @param BrandLegalEntityType|value-of<BrandLegalEntityType> $legalEntityType
     */
    public function withLegalEntityType(
        BrandLegalEntityType|string $legalEntityType
    ): self {
        $self = clone $this;
        $self['legalEntityType'] = $legalEntityType;

        return $self;
    }

    public function withLegalName(string $legalName): self
    {
        $self = clone $this;
        $self['legalName'] = $legalName;

        return $self;
    }

    /**
     * @param BrandOrganizationType|value-of<BrandOrganizationType> $organizationType
     */
    public function withOrganizationType(
        BrandOrganizationType|string $organizationType
    ): self {
        $self = clone $this;
        $self['organizationType'] = $organizationType;

        return $self;
    }

    public function withWebsiteURL(string $websiteURL): self
    {
        $self = clone $this;
        $self['websiteURL'] = $websiteURL;

        return $self;
    }

    /**
     * A Messaging Profile owned by the authenticated organization. Agents inherit this value when they do not provide their own profile.
     */
    public function withProfileID(?string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }
}
