<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\AuthenticationProviders\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates an authentication provider.
 *
 * @see Telnyx\Services\AuthenticationProvidersService::create()
 *
 * @phpstan-type AuthenticationProviderCreateParamsShape = array{
 *   name: string,
 *   settings: Settings|array{
 *     idpCertFingerprint: string,
 *     idpEntityID: string,
 *     idpSSOTargetURL: string,
 *     idpCertFingerprintAlgorithm?: value-of<IdpCertFingerprintAlgorithm>|null,
 *   },
 *   shortName: string,
 *   active?: bool,
 *   settingsURL?: string,
 * }
 */
final class AuthenticationProviderCreateParams implements BaseModel
{
    /** @use SdkModel<AuthenticationProviderCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name associated with the authentication provider.
     */
    #[Required]
    public string $name;

    /**
     * The settings associated with the authentication provider.
     */
    #[Required]
    public Settings $settings;

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    #[Required('short_name')]
    public string $shortName;

    /**
     * The active status of the authentication provider.
     */
    #[Optional]
    public ?bool $active;

    /**
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    #[Optional('settings_url')]
    public ?string $settingsURL;

    /**
     * `new AuthenticationProviderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthenticationProviderCreateParams::with(
     *   name: ..., settings: ..., shortName: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AuthenticationProviderCreateParams)
     *   ->withName(...)
     *   ->withSettings(...)
     *   ->withShortName(...)
     * ```
     */
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
        string $name,
        Settings|array $settings,
        string $shortName,
        ?bool $active = null,
        ?string $settingsURL = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;
        $obj['settings'] = $settings;
        $obj['shortName'] = $shortName;

        null !== $active && $obj['active'] = $active;
        null !== $settingsURL && $obj['settingsURL'] = $settingsURL;

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
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    public function withShortName(string $shortName): self
    {
        $obj = clone $this;
        $obj['shortName'] = $shortName;

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
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    public function withSettingsURL(string $settingsURL): self
    {
        $obj = clone $this;
        $obj['settingsURL'] = $settingsURL;

        return $obj;
    }
}
