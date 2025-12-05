<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings;
use Telnyx\AuthenticationProviders\AuthenticationProvider\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AuthenticationProviderShape = array{
 *   id?: string|null,
 *   active?: bool|null,
 *   created_at?: \DateTimeInterface|null,
 *   name?: string|null,
 *   organization_id?: string|null,
 *   record_type?: string|null,
 *   settings?: \Telnyx\AuthenticationProviders\AuthenticationProvider\Settings|null,
 *   short_name?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class AuthenticationProvider implements BaseModel
{
    /** @use SdkModel<AuthenticationProviderShape> */
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * The name associated with the authentication provider.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The id from the Organization the authentication provider belongs to.
     */
    #[Api(optional: true)]
    public ?string $organization_id;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * The settings associated with the authentication provider.
     */
    #[Api(optional: true)]
    public ?Settings $settings;

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    #[Api(optional: true)]
    public ?string $short_name;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
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
     * @param Settings|array{
     *   assertion_consumer_service_url?: string|null,
     *   idp_cert_fingerprint?: string|null,
     *   idp_cert_fingerprint_algorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
     *   idp_entity_id?: string|null,
     *   idp_sso_target_url?: string|null,
     *   name_identifier_format?: string|null,
     *   service_provider_entity_id?: string|null,
     * } $settings
     */
    public static function with(
        ?string $id = null,
        ?bool $active = null,
        ?\DateTimeInterface $created_at = null,
        ?string $name = null,
        ?string $organization_id = null,
        ?string $record_type = null,
        Settings|array|null $settings = null,
        ?string $short_name = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $active && $obj['active'] = $active;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $name && $obj['name'] = $name;
        null !== $organization_id && $obj['organization_id'] = $organization_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $settings && $obj['settings'] = $settings;
        null !== $short_name && $obj['short_name'] = $short_name;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
        $obj['created_at'] = $createdAt;

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
     * The settings associated with the authentication provider.
     *
     * @param Settings|array{
     *   assertion_consumer_service_url?: string|null,
     *   idp_cert_fingerprint?: string|null,
     *   idp_cert_fingerprint_algorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
     *   idp_entity_id?: string|null,
     *   idp_sso_target_url?: string|null,
     *   name_identifier_format?: string|null,
     *   service_provider_entity_id?: string|null,
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
        $obj['short_name'] = $shortName;

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
