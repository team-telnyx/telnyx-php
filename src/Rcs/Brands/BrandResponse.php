<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Brands;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\CapabilitiesResponse;
use Telnyx\Rcs\Brands\BrandResponse\Address;
use Telnyx\Rcs\Brands\BrandResponse\Identifier;
use Telnyx\Rcs\Brands\BrandResponse\Status;

/**
 * @phpstan-import-type IdentifierVariants from \Telnyx\Rcs\Brands\BrandResponse\Identifier
 * @phpstan-import-type AddressShape from \Telnyx\Rcs\Brands\BrandResponse\Address
 * @phpstan-import-type CapabilitiesResponseShape from \Telnyx\Rcs\Agents\CapabilitiesResponse
 * @phpstan-import-type BrandContactShape from \Telnyx\Rcs\Brands\BrandContact
 * @phpstan-import-type IdentifierShape from \Telnyx\Rcs\Brands\BrandResponse\Identifier
 *
 * @phpstan-type BrandResponseShape = array{
 *   addresses: array<string,Address|AddressShape>,
 *   brandID: string,
 *   capabilities: CapabilitiesResponse|CapabilitiesResponseShape,
 *   contacts: array<string,BrandContact|BrandContactShape>,
 *   displayName: string,
 *   identifiers: array<string,IdentifierShape>,
 *   legalEntityType: string,
 *   legalName: string,
 *   organizationType: string,
 *   profileID: string|null,
 *   status: Status|value-of<Status>,
 *   websiteURL: string,
 * }
 */
final class BrandResponse implements BaseModel
{
    /** @use SdkModel<BrandResponseShape> */
    use SdkModel;

    /** @var array<string,Address> $addresses */
    #[Required(map: Address::class)]
    public array $addresses;

    #[Required('brand_id')]
    public string $brandID;

    #[Required]
    public CapabilitiesResponse $capabilities;

    /** @var array<string,BrandContact> $contacts */
    #[Required(map: BrandContact::class)]
    public array $contacts;

    #[Required('display_name')]
    public string $displayName;

    /** @var array<string,IdentifierVariants> $identifiers */
    #[Required(map: Identifier::class)]
    public array $identifiers;

    #[Required('legal_entity_type')]
    public string $legalEntityType;

    #[Required('legal_name')]
    public string $legalName;

    #[Required('organization_type')]
    public string $organizationType;

    #[Required('profile_id')]
    public ?string $profileID;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('website_url')]
    public string $websiteURL;

    /**
     * `new BrandResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BrandResponse::with(
     *   addresses: ...,
     *   brandID: ...,
     *   capabilities: ...,
     *   contacts: ...,
     *   displayName: ...,
     *   identifiers: ...,
     *   legalEntityType: ...,
     *   legalName: ...,
     *   organizationType: ...,
     *   profileID: ...,
     *   status: ...,
     *   websiteURL: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BrandResponse)
     *   ->withAddresses(...)
     *   ->withBrandID(...)
     *   ->withCapabilities(...)
     *   ->withContacts(...)
     *   ->withDisplayName(...)
     *   ->withIdentifiers(...)
     *   ->withLegalEntityType(...)
     *   ->withLegalName(...)
     *   ->withOrganizationType(...)
     *   ->withProfileID(...)
     *   ->withStatus(...)
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
     * @param array<string,Address|AddressShape> $addresses
     * @param CapabilitiesResponse|CapabilitiesResponseShape $capabilities
     * @param array<string,BrandContact|BrandContactShape> $contacts
     * @param array<string,IdentifierShape> $identifiers
     * @param Status|value-of<Status> $status
     */
    public static function with(
        array $addresses,
        string $brandID,
        CapabilitiesResponse|array $capabilities,
        array $contacts,
        string $displayName,
        array $identifiers,
        string $legalEntityType,
        string $legalName,
        string $organizationType,
        ?string $profileID,
        Status|string $status,
        string $websiteURL,
    ): self {
        $self = new self;

        $self['addresses'] = $addresses;
        $self['brandID'] = $brandID;
        $self['capabilities'] = $capabilities;
        $self['contacts'] = $contacts;
        $self['displayName'] = $displayName;
        $self['identifiers'] = $identifiers;
        $self['legalEntityType'] = $legalEntityType;
        $self['legalName'] = $legalName;
        $self['organizationType'] = $organizationType;
        $self['profileID'] = $profileID;
        $self['status'] = $status;
        $self['websiteURL'] = $websiteURL;

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

    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * @param CapabilitiesResponse|CapabilitiesResponseShape $capabilities
     */
    public function withCapabilities(
        CapabilitiesResponse|array $capabilities
    ): self {
        $self = clone $this;
        $self['capabilities'] = $capabilities;

        return $self;
    }

    /**
     * @param array<string,BrandContact|BrandContactShape> $contacts
     */
    public function withContacts(array $contacts): self
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
     * @param array<string,IdentifierShape> $identifiers
     */
    public function withIdentifiers(array $identifiers): self
    {
        $self = clone $this;
        $self['identifiers'] = $identifiers;

        return $self;
    }

    public function withLegalEntityType(string $legalEntityType): self
    {
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

    public function withOrganizationType(string $organizationType): self
    {
        $self = clone $this;
        $self['organizationType'] = $organizationType;

        return $self;
    }

    public function withProfileID(?string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withWebsiteURL(string $websiteURL): self
    {
        $self = clone $this;
        $self['websiteURL'] = $websiteURL;

        return $self;
    }
}
