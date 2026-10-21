<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Settings for a community text-to-speech engine voice (`<EngineName>.<VoiceId>`). `api_key_ref` is required. Every other key is a setting the engine declares in its `voice_settings_schema`, and is passed to the engine as sent. See the [Community TTS engines guide](/docs/voice/tts/community-engines).
 *
 * @phpstan-type CommunityVoiceSettingsShape = array{apiKeyRef: string}
 */
final class CommunityVoiceSettings implements BaseModel
{
    /** @use SdkModel<CommunityVoiceSettingsShape> */
    use SdkModel;

    /**
     * The `identifier` of an integration secret that holds your key for the engine. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details.
     */
    #[Required('api_key_ref')]
    public string $apiKeyRef;

    /**
     * `new CommunityVoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunityVoiceSettings::with(apiKeyRef: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunityVoiceSettings)->withAPIKeyRef(...)
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
    public static function with(string $apiKeyRef): self
    {
        $self = new self;

        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * The `identifier` of an integration secret that holds your key for the engine. See [integration secrets documentation](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) for details.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }
}
