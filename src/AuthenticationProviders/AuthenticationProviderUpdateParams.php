<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates settings of an existing authentication provider.
 *
 * @see Telnyx\Services\AuthenticationProvidersService::update()
 *
 * @phpstan-import-type SettingsShape from \Telnyx\AuthenticationProviders\Settings
 *
 * @phpstan-type AuthenticationProviderUpdateParamsShape = array{
 *   active?: bool|null,
 *   name?: string|null,
 *   settings?: SettingsShape|null,
 *   settingsURL?: string|null,
 *   shortName?: string|null,
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
     * @param SettingsShape $settings
     */
    public static function with(
        ?bool $active = null,
        ?string $name = null,
        Settings|array|null $settings = null,
        ?string $settingsURL = null,
        ?string $shortName = null,
    ): self {
        $self = new self;

        null !== $active && $self['active'] = $active;
        null !== $name && $self['name'] = $name;
        null !== $settings && $self['settings'] = $settings;
        null !== $settingsURL && $self['settingsURL'] = $settingsURL;
        null !== $shortName && $self['shortName'] = $shortName;

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
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    public function withSettingsURL(string $settingsURL): self
    {
        $self = clone $this;
        $self['settingsURL'] = $settingsURL;

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
}
