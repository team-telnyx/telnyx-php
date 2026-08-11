<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Brands\BrandUpdateParams\Address;
use Telnyx\Rcs\Brands\BrandUpdateParams\Contacts;
use Telnyx\Rcs\Brands\BrandUpdateParams\Identifiers;

/**
 * Updates one or more fields on a brand while its status is `CREATED`. Submitted brands cannot be changed.
 *
 * @see Telnyx\Services\Rcs\BrandsService::update()
 *
 * @phpstan-import-type AddressShape from \Telnyx\Rcs\Brands\BrandUpdateParams\Address
 * @phpstan-import-type ContactsShape from \Telnyx\Rcs\Brands\BrandUpdateParams\Contacts
 * @phpstan-import-type IdentifiersShape from \Telnyx\Rcs\Brands\BrandUpdateParams\Identifiers
 *
 * @phpstan-type BrandUpdateParamsShape = array{
 *   addresses?: array<string,Address|AddressShape>|null,
 *   contacts?: null|Contacts|ContactsShape,
 *   displayName?: string|null,
 *   identifiers?: null|Identifiers|IdentifiersShape,
 *   legalEntityType?: null|BrandLegalEntityType|value-of<BrandLegalEntityType>,
 *   legalName?: string|null,
 *   organizationType?: null|BrandOrganizationType|value-of<BrandOrganizationType>,
 *   profileID?: string|null,
 *   websiteURL?: string|null,
 * }
 */
final class BrandUpdateParams implements BaseModel
{
    /** @use SdkModel<BrandUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,Address>|null $addresses */
    #[Optional(map: Address::class)]
    public ?array $addresses;

    /**
     * Named business contacts. Use the `brand` key for the required BRAND contact.
     */
    #[Optional]
    public ?Contacts $contacts;

    #[Optional('display_name')]
    public ?string $displayName;

    /**
     * Named business identifiers. Use the `ein` key for the required EIN and `stock_symbol` for a public-profit brand's stock symbol.
     */
    #[Optional]
    public ?Identifiers $identifiers;

    /** @var value-of<BrandLegalEntityType>|null $legalEntityType */
    #[Optional('legal_entity_type', enum: BrandLegalEntityType::class)]
    public ?string $legalEntityType;

    #[Optional('legal_name')]
    public ?string $legalName;

    /** @var value-of<BrandOrganizationType>|null $organizationType */
    #[Optional('organization_type', enum: BrandOrganizationType::class)]
    public ?string $organizationType;

    #[Optional('profile_id')]
    public ?string $profileID;

    #[Optional('website_url')]
    public ?string $websiteURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,Address|AddressShape>|null $addresses
     * @param Contacts|ContactsShape|null $contacts
     * @param Identifiers|IdentifiersShape|null $identifiers
     * @param BrandLegalEntityType|value-of<BrandLegalEntityType>|null $legalEntityType
     * @param BrandOrganizationType|value-of<BrandOrganizationType>|null $organizationType
     */
    public static function with(
        ?array $addresses = null,
        Contacts|array|null $contacts = null,
        ?string $displayName = null,
        Identifiers|array|null $identifiers = null,
        BrandLegalEntityType|string|null $legalEntityType = null,
        ?string $legalName = null,
        BrandOrganizationType|string|null $organizationType = null,
        ?string $profileID = null,
        ?string $websiteURL = null,
    ): self {
        $self = new self;

        null !== $addresses && $self['addresses'] = $addresses;
        null !== $contacts && $self['contacts'] = $contacts;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $identifiers && $self['identifiers'] = $identifiers;
        null !== $legalEntityType && $self['legalEntityType'] = $legalEntityType;
        null !== $legalName && $self['legalName'] = $legalName;
        null !== $organizationType && $self['organizationType'] = $organizationType;
        null !== $profileID && $self['profileID'] = $profileID;
        null !== $websiteURL && $self['websiteURL'] = $websiteURL;

        return $self;
    }

    /**
     * @param array<string,Address|AddressShape> $addresses
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

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    public function withWebsiteURL(string $websiteURL): self
    {
        $self = clone $this;
        $self['websiteURL'] = $websiteURL;

        return $self;
    }
}
