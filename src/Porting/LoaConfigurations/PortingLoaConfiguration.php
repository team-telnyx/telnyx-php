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
 *   company_name?: string|null,
 *   contact?: Contact|null,
 *   created_at?: \DateTimeInterface|null,
 *   logo?: Logo|null,
 *   name?: string|null,
 *   organization_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
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
    #[Optional]
    public ?string $company_name;

    /**
     * The contact information of the company.
     */
    #[Optional]
    public ?Contact $contact;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

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
    #[Optional]
    public ?string $organization_id;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updated_at;

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
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   state?: string|null,
     *   street_address?: string|null,
     *   zip_code?: string|null,
     * } $address
     * @param Contact|array{email?: string|null, phone_number?: string|null} $contact
     * @param Logo|array{
     *   content_type?: value-of<ContentType>|null, document_id?: string|null
     * } $logo
     */
    public static function with(
        ?string $id = null,
        Address|array|null $address = null,
        ?string $company_name = null,
        Contact|array|null $contact = null,
        ?\DateTimeInterface $created_at = null,
        Logo|array|null $logo = null,
        ?string $name = null,
        ?string $organization_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $address && $obj['address'] = $address;
        null !== $company_name && $obj['company_name'] = $company_name;
        null !== $contact && $obj['contact'] = $contact;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $logo && $obj['logo'] = $logo;
        null !== $name && $obj['name'] = $name;
        null !== $organization_id && $obj['organization_id'] = $organization_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   state?: string|null,
     *   street_address?: string|null,
     *   zip_code?: string|null,
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
        $obj['company_name'] = $companyName;

        return $obj;
    }

    /**
     * The contact information of the company.
     *
     * @param Contact|array{email?: string|null, phone_number?: string|null} $contact
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
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The logo to be used in the LOA.
     *
     * @param Logo|array{
     *   content_type?: value-of<ContentType>|null, document_id?: string|null
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
        $obj['organization_id'] = $organizationID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
