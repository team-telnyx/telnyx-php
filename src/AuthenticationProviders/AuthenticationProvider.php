<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type authentication_provider = array{
 *   id?: string,
 *   active?: bool,
 *   createdAt?: \DateTimeInterface,
 *   name?: string,
 *   organizationID?: string,
 *   recordType?: string,
 *   settings?: Settings,
 *   shortName?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class AuthenticationProvider implements BaseModel
{
    /** @use SdkModel<authentication_provider> */
    use SdkModel;

    /**
     * Uniquely identifies the authentication provider.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The active status of the authentication provider.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The name associated with the authentication provider.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The id from the Organization the authentication provider belongs to.
     */
    #[Api('organization_id', optional: true)]
    public ?string $organizationID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * The settings associated with the authentication provider.
     */
    #[Api(optional: true)]
    public ?Settings $settings;

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    #[Api('short_name', optional: true)]
    public ?string $shortName;

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
        ?bool $active = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $organizationID = null,
        ?string $recordType = null,
        ?Settings $settings = null,
        ?string $shortName = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $active && $obj->active = $active;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $name && $obj->name = $name;
        null !== $organizationID && $obj->organizationID = $organizationID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $settings && $obj->settings = $settings;
        null !== $shortName && $obj->shortName = $shortName;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the authentication provider.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The active status of the authentication provider.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj->active = $active;

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
     * The name associated with the authentication provider.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The id from the Organization the authentication provider belongs to.
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
     * The settings associated with the authentication provider.
     */
    public function withSettings(Settings $settings): self
    {
        $obj = clone $this;
        $obj->settings = $settings;

        return $obj;
    }

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    public function withShortName(string $shortName): self
    {
        $obj = clone $this;
        $obj->shortName = $shortName;

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
