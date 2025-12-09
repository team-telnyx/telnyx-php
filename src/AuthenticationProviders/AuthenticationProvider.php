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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $name && $obj['name'] = $name;
        null !== $organizationID && $obj['organizationID'] = $organizationID;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $settings && $obj['settings'] = $settings;
        null !== $shortName && $obj['shortName'] = $shortName;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Uniquely identifies the authentication provider.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The active status of the authentication provider.
     */
    public function withActive(bool $active): self
    {
        $obj = clone $this;
        $obj['active'] = $active;

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
     * The name associated with the authentication provider.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The id from the Organization the authentication provider belongs to.
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
        $obj = clone $this;
        $obj['settings'] = $settings;

        return $obj;
    }

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    public function withShortName(string $shortName): self
    {
        $obj = clone $this;
        $obj['shortName'] = $shortName;

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
