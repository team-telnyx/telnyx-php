<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Address;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Contact;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Logo;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Logo\ContentType;

/**
 * @phpstan-type PortingLoaConfigurationShape = array{
 *   id?: string|null,
 *   address?: Address|null,
 *   companyName?: string|null,
 *   contact?: Contact|null,
 *   createdAt?: \DateTimeInterface|null,
 *   logo?: Logo|null,
 *   name?: string|null,
 *   organizationID?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PortingLoaConfiguration implements BaseModel
{
    /** @use SdkModel<PortingLoaConfigurationShape> */
    use SdkModel;

    /**
     * Uniquely identifies the LOA configuration.
     */
    #[Optional]
    public ?string $id;

    /**
     * The address of the company.
     */
    #[Optional]
    public ?Address $address;

    /**
     * The name of the company.
     */
    #[Optional('company_name')]
    public ?string $companyName;

    /**
     * The contact information of the company.
     */
    #[Optional]
    public ?Contact $contact;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The logo to be used in the LOA.
     */
    #[Optional]
    public ?Logo $logo;

    /**
     * The name of the LOA configuration.
     */
    #[Optional]
    public ?string $name;

    /**
     * The organization that owns the LOA configuration.
     */
    #[Optional('organization_id')]
    public ?string $organizationID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Address|array{
     *   city?: string|null,
     *   countryCode?: string|null,
     *   extendedAddress?: string|null,
     *   state?: string|null,
     *   streetAddress?: string|null,
     *   zipCode?: string|null,
     * } $address
     * @param Contact|array{email?: string|null, phoneNumber?: string|null} $contact
     * @param Logo|array{
     *   contentType?: value-of<ContentType>|null, documentID?: string|null
     * } $logo
     */
    public static function with(
        ?string $id = null,
        Address|array|null $address = null,
        ?string $companyName = null,
        Contact|array|null $contact = null,
        ?\DateTimeInterface $createdAt = null,
        Logo|array|null $logo = null,
        ?string $name = null,
        ?string $organizationID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $address && $self['address'] = $address;
        null !== $companyName && $self['companyName'] = $companyName;
        null !== $contact && $self['contact'] = $contact;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $logo && $self['logo'] = $logo;
        null !== $name && $self['name'] = $name;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies the LOA configuration.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The address of the company.
     *
     * @param Address|array{
     *   city?: string|null,
     *   countryCode?: string|null,
     *   extendedAddress?: string|null,
     *   state?: string|null,
     *   streetAddress?: string|null,
     *   zipCode?: string|null,
     * } $address
     */
    public function withAddress(Address|array $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    /**
     * The name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $self = clone $this;
        $self['companyName'] = $companyName;

        return $self;
    }

    /**
     * The contact information of the company.
     *
     * @param Contact|array{email?: string|null, phoneNumber?: string|null} $contact
     */
    public function withContact(Contact|array $contact): self
    {
        $self = clone $this;
        $self['contact'] = $contact;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The logo to be used in the LOA.
     *
     * @param Logo|array{
     *   contentType?: value-of<ContentType>|null, documentID?: string|null
     * } $logo
     */
    public function withLogo(Logo|array $logo): self
    {
        $self = clone $this;
        $self['logo'] = $logo;

        return $self;
    }

    /**
     * The name of the LOA configuration.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The organization that owns the LOA configuration.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
