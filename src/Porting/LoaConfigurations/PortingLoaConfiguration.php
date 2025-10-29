<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Address;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Contact;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Logo;

/**
 * @phpstan-type PortingLoaConfigurationShape = array{
 *   id?: string,
 *   address?: Address,
 *   companyName?: string,
 *   contact?: Contact,
 *   createdAt?: \DateTimeInterface,
 *   logo?: Logo,
 *   name?: string,
 *   organizationID?: string,
 *   recordType?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class PortingLoaConfiguration implements BaseModel
{
    /** @use SdkModel<PortingLoaConfigurationShape> */
    use SdkModel;

    /**
     * Uniquely identifies the LOA configuration.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The address of the company.
     */
    #[Api(optional: true)]
    public ?Address $address;

    /**
     * The name of the company.
     */
    #[Api('company_name', optional: true)]
    public ?string $companyName;

    /**
     * The contact information of the company.
     */
    #[Api(optional: true)]
    public ?Contact $contact;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The logo to be used in the LOA.
     */
    #[Api(optional: true)]
    public ?Logo $logo;

    /**
     * The name of the LOA configuration.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The organization that owns the LOA configuration.
     */
    #[Api('organization_id', optional: true)]
    public ?string $organizationID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

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
        ?string $id = null,
        ?Address $address = null,
        ?string $companyName = null,
        ?Contact $contact = null,
        ?\DateTimeInterface $createdAt = null,
        ?Logo $logo = null,
        ?string $name = null,
        ?string $organizationID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $address && $obj->address = $address;
        null !== $companyName && $obj->companyName = $companyName;
        null !== $contact && $obj->contact = $contact;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $logo && $obj->logo = $logo;
        null !== $name && $obj->name = $name;
        null !== $organizationID && $obj->organizationID = $organizationID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the LOA configuration.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The address of the company.
     */
    public function withAddress(Address $address): self
    {
        $obj = clone $this;
        $obj->address = $address;

        return $obj;
    }

    /**
     * The name of the company.
     */
    public function withCompanyName(string $companyName): self
    {
        $obj = clone $this;
        $obj->companyName = $companyName;

        return $obj;
    }

    /**
     * The contact information of the company.
     */
    public function withContact(Contact $contact): self
    {
        $obj = clone $this;
        $obj->contact = $contact;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The logo to be used in the LOA.
     */
    public function withLogo(Logo $logo): self
    {
        $obj = clone $this;
        $obj->logo = $logo;

        return $obj;
    }

    /**
     * The name of the LOA configuration.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The organization that owns the LOA configuration.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj->organizationID = $organizationID;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
