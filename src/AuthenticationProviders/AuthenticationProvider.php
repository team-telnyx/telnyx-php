<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings;
use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthenticationProviderShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   organizationID?: string|null,
 *   recordType?: string|null,
 *   settings?: \Telnyx\AuthenticationProviders\AuthenticationProvider\Settings|null,
 *   shortName?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class AuthenticationProvider implements BaseModel
{
    /** @use SdkModel<AuthenticationProviderShape> */
    use SdkModel;

    /**
     * Uniquely identifies the authentication provider.
     */
    #[Optional]
    public ?string $id;

    /**
     * The active status of the authentication provider.
     */
    #[Optional]
    public ?bool $active;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The name associated with the authentication provider.
     */
    #[Optional]
    public ?string $name;

    /**
     * The id from the Organization the authentication provider belongs to.
     */
    #[Optional('organization_id')]
    public ?string $organizationID;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * The settings associated with the authentication provider.
     */
    #[Optional]
    public ?Settings $settings;

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    #[Optional('short_name')]
    public ?string $shortName;

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
     * @param Settings|array{
     *   assertionConsumerServiceURL?: string|null,
     *   idpCertFingerprint?: string|null,
     *   idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
     *   idpEntityID?: string|null,
     *   idpSSOTargetURL?: string|null,
     *   nameIdentifierFormat?: string|null,
     *   serviceProviderEntityID?: string|null,
     * } $settings
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $organizationID = null,
        ?string $recordType = null,
        Settings|array|null $settings = null,
        ?string $shortName = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $active && $self['active'] = $active;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $settings && $self['settings'] = $settings;
        null !== $shortName && $self['shortName'] = $shortName;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies the authentication provider.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The active status of the authentication provider.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

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
     * The name associated with the authentication provider.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The id from the Organization the authentication provider belongs to.
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
     * The settings associated with the authentication provider.
     *
     * @param Settings|array{
     *   assertionConsumerServiceURL?: string|null,
     *   idpCertFingerprint?: string|null,
     *   idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
     *   idpEntityID?: string|null,
     *   idpSSOTargetURL?: string|null,
     *   nameIdentifierFormat?: string|null,
     *   serviceProviderEntityID?: string|null,
     * } $settings
     */
    public function withSettings(
        Settings|array $settings,
    ): self {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    public function withShortName(string $shortName): self
    {
        $self = clone $this;
        $self['shortName'] = $shortName;

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
