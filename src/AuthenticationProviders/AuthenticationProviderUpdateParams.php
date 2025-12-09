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
 *     idpCertFingerprint: string,
 *     idpEntityID: string,
 *     idpSSOTargetURL: string,
 *     idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
 *   },
 *   settingsURL?: string,
 *   shortName?: string,
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
    #[Optional('settings_url')]
    public ?string $settingsURL;

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    #[Optional('short_name')]
    public ?string $shortName;

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
     *   idpCertFingerprint: string,
     *   idpEntityID: string,
     *   idpSSOTargetURL: string,
     *   idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
     * } $settings
     */
    public static function with(
        ?bool $active = null,
        ?string $name = null,
        Settings|array|null $settings = null,
        ?string $settingsURL = null,
        ?string $shortName = null,
    ): self {
        $obj = new self;

        null !== $active && $obj['active'] = $active;
        null !== $name && $obj['name'] = $name;
        null !== $settings && $obj['settings'] = $settings;
        null !== $settingsURL && $obj['settingsURL'] = $settingsURL;
        null !== $shortName && $obj['shortName'] = $shortName;

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
     *   idpCertFingerprint: string,
     *   idpEntityID: string,
     *   idpSSOTargetURL: string,
     *   idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
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
        $obj['settingsURL'] = $settingsURL;

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
}
