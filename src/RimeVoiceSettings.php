<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RimeVoiceSettings\Type;

/**
 * @phpstan-type RimeVoiceSettingsShape = array{
 *   type: Type|value-of<Type>, apiKeyRef?: string|null, voiceSpeed?: float|null
 * }
 */
final class RimeVoiceSettings implements BaseModel
{
    /** @use SdkModel<RimeVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Rime API key. Only required when using your own Rime account.
     */
    #[Optional('api_key_ref')]
    public ?string $apiKeyRef;

    /**
     * Speech speed multiplier. Default is 1.0.
     */
    #[Optional('voice_speed')]
    public ?float $voiceSpeed;

    /**
     * `new RimeVoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RimeVoiceSettings::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RimeVoiceSettings)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Type|string $type,
        ?string $apiKeyRef = null,
        ?float $voiceSpeed = null
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $voiceSpeed && $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Rime API key. Only required when using your own Rime account.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * Speech speed multiplier. Default is 1.0.
     */
    public function withVoiceSpeed(float $voiceSpeed): self
    {
        $self = clone $this;
        $self['voiceSpeed'] = $voiceSpeed;

        return $self;
    }
}
