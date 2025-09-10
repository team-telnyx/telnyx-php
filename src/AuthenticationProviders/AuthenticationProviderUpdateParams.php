<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AuthenticationProviderUpdateParams); // set properties as needed
 * $client->authenticationProviders->update(...$params->toArray());
 * ```
 * Updates settings of an existing authentication provider.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->authenticationProviders->update(...$params->toArray());`
 *
 * @see Telnyx\AuthenticationProviders->update
 *
 * @phpstan-type authentication_provider_update_params = array{
 *   active?: bool,
 *   name?: string,
 *   settings?: Settings,
 *   settingsURL?: string,
 *   shortName?: string,
 * }
 */
final class AuthenticationProviderUpdateParams implements BaseModel
{
    /** @use SdkModel<authentication_provider_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The active status of the authentication provider.
     */
    #[Api(optional: true)]
    public ?bool $active;

    /**
     * The name associated with the authentication provider.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The settings associated with the authentication provider.
     */
    #[Api(optional: true)]
    public ?Settings $settings;

    /**
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    #[Api('settings_url', optional: true)]
    public ?string $settingsURL;

    /**
     * The short name associated with the authentication provider. This must be unique and URL-friendly, as it's going to be part of the login URL.
     */
    #[Api('short_name', optional: true)]
    public ?string $shortName;

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
        ?bool $active = null,
        ?string $name = null,
        ?Settings $settings = null,
        ?string $settingsURL = null,
        ?string $shortName = null,
    ): self {
        $obj = new self;

        null !== $active && $obj->active = $active;
        null !== $name && $obj->name = $name;
        null !== $settings && $obj->settings = $settings;
        null !== $settingsURL && $obj->settingsURL = $settingsURL;
        null !== $shortName && $obj->shortName = $shortName;

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
     * The URL for the identity provider metadata file to populate the settings automatically. If the settings attribute is provided, that will be used instead.
     */
    public function withSettingsURL(string $settingsURL): self
    {
        $obj = clone $this;
        $obj->settingsURL = $settingsURL;

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
}
