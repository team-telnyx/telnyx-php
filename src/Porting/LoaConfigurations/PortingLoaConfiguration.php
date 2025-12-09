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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $address && $obj['address'] = $address;
        null !== $companyName && $obj['companyName'] = $companyName;
        null !== $contact && $obj['contact'] = $contact;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $logo && $obj['logo'] = $logo;
        null !== $name && $obj['name'] = $name;
        null !== $organizationID && $obj['organizationID'] = $organizationID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the LOA configuration.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
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
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    /**
     * The name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj['companyName'] = $companyName;

        return $obj;
    }

    /**
     * The contact information of the company.
     *
     * @param Contact|array{email?: string|null, phoneNumber?: string|null} $contact
     */
    public function withContact(Contact|array $contact): self
    {
        $obj = clone $this;
        $obj['contact'] = $contact;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
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
        $obj = clone $this;
        $obj['logo'] = $logo;

        return $obj;
    }

    /**
     * The name of the LOA configuration.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The organization that owns the LOA configuration.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj['organizationID'] = $organizationID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
