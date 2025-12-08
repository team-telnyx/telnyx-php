<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates settings of an existing authentication provider.
 *
 * @see Telnyx\Services\AuthenticationProvidersService::update()
 *
 * @phpstan-type AuthenticationProviderUpdateParamsShape = array{
 *   active?: bool,
 *   name?: string,
 *   settings?: Settings|array{
 *     idp_cert_fingerprint: string,
 *     idp_entity_id: string,
 *     idp_sso_target_url: string,
 *     idp_cert_fingerprint_algorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
 *   },
 *   settings_url?: string,
 *   short_name?: string,
 * }
 */
final class AuthenticationProviderUpdateParams implements BaseModel
{
    /** @use SdkModel<AuthenticationProviderUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The active status of the authentication provider.
     */
    #[Optional]
    public ?bool $active;

    /**
     * The name associated with the authentication provider.
     */
    #[Optional]
    public ?string $name;

    /**
     * The settings associated with the authentication provider.
     */
    #[Optional]
    public ?Settings $settings;

    /**
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    #[Optional]
    public ?string $settings_url;

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    #[Optional]
    public ?string $short_name;

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
     *   idp_cert_fingerprint: string,
     *   idp_entity_id: string,
     *   idp_sso_target_url: string,
     *   idp_cert_fingerprint_algorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
     * } $settings
     */
    public static function with(
        ?bool $active = null,
        ?string $name = null,
        Settings|array|null $settings = null,
        ?string $settings_url = null,
        ?string $short_name = null,
    ): self {
        $obj = new self;

        null !== $active && $obj['active'] = $active;
        null !== $name && $obj['name'] = $name;
        null !== $settings && $obj['settings'] = $settings;
        null !== $settings_url && $obj['settings_url'] = $settings_url;
        null !== $short_name && $obj['short_name'] = $short_name;

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
     * The name associated with the authentication provider.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The settings associated with the authentication provider.
     *
     * @param Settings|array{
     *   idp_cert_fingerprint: string,
     *   idp_entity_id: string,
     *   idp_sso_target_url: string,
     *   idp_cert_fingerprint_algorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
     * } $settings
     */
    public function withSettings(Settings|array $settings): self
    {
        $obj = clone $this;
        $obj['settings'] = $settings;

        return $obj;
    }

    /**
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    public function withSettingsURL(string $settingsURL): self
    {
        $obj = clone $this;
        $obj['settings_url'] = $settingsURL;

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
}
