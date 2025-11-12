<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\Core\Attributes\Api;
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
 *   settings: Settings,
 *   short_name: string,
 *   active?: bool,
 *   settings_url?: string,
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
    #[Api]
    public string $name;

    /**
     * The settings associated with the authentication provider.
     */
    #[Api]
    public Settings $settings;

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    #[Api]
    public string $short_name;

    /**
     * The active status of the authentication provider.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    #[Api(optional: true)]
    public ?string $settings_url;

    /**
     * `new AuthenticationProviderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AuthenticationProviderCreateParams::with(
     *   name: ..., settings: ..., short_name: ...
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
     */
    public static function with(
        string $name,
        Settings $settings,
        string $short_name,
        ?bool $active = null,
        ?string $settings_url = null,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->settings = $settings;
        $obj->short_name = $short_name;

        null !== $active && $obj->active = $active;
        null !== $settings_url && $obj->settings_url = $settings_url;

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
        $obj->short_name = $shortName;

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
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    public function withSettingsURL(string $settingsURL): self
    {
        $obj = clone $this;
        $obj->settings_url = $settingsURL;

        return $obj;
    }
}
