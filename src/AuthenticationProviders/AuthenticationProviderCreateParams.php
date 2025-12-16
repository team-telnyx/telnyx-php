<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

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
 * @phpstan-import-type SettingsShape from \Telnyx\AuthenticationProviders\Settings
 *
 * @phpstan-type AuthenticationProviderCreateParamsShape = array{
 *   name: string,
 *   settings: SettingsShape,
 *   shortName: string,
 *   active?: bool|null,
 *   settingsURL?: string|null,
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
     * @param SettingsShape $settings
     */
    public static function with(
        string $name,
        Settings|array $settings,
        string $shortName,
        ?bool $active = null,
        ?string $settingsURL = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['settings'] = $settings;
        $self['shortName'] = $shortName;

        null !== $active && $self['active'] = $active;
        null !== $settingsURL && $self['settingsURL'] = $settingsURL;

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
     * The settings associated with the authentication provider.
     *
     * @param SettingsShape $settings
     */
    public function withSettings(Settings|array $settings): self
    {
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
     * The active status of the authentication provider.
     */
    public function withActive(bool $active): self
    {
        $self = clone $this;
        $self['active'] = $active;

        return $self;
    }

    /**
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    public function withSettingsURL(string $settingsURL): self
    {
        $self = clone $this;
        $self['settingsURL'] = $settingsURL;

        return $self;
    }
}
