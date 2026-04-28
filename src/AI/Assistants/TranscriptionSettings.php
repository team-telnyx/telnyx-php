<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\TranscriptionSettings\Model;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TranscriptionSettingsConfigShape from \Telnyx\AI\Assistants\TranscriptionSettingsConfig
 *
 * @phpstan-type TranscriptionSettingsShape = array{
 *   apiKeyRef?: string|null,
 *   language?: string|null,
 *   model?: null|Model|value-of<Model>,
 *   region?: string|null,
 *   settings?: null|TranscriptionSettingsConfig|TranscriptionSettingsConfigShape,
 * }
 */
final class TranscriptionSettings implements BaseModel
{
    /** @use SdkModel<TranscriptionSettingsShape> */
    use SdkModel;

    /**
     * Integration secret identifier for the transcription provider API key. Currently used for Azure transcription regions that require a customer-provided API key.
     */
    #[Optional('api_key_ref')]
    public ?string $apiKeyRef;

    /**
     * The language of the audio to be transcribed. If not set, or if set to `auto`, supported models will automatically detect the language. For `deepgram/flux`, supported values are: `auto` (Telnyx language detection controls the language hint), `multi` (no language hint), and language-specific hints `en`, `es`, `fr`, `de`, `hi`, `ru`, `pt`, `ja`, `it`, and `nl`.
     */
    #[Optional]
    public ?string $language;

    /**
     * The speech to text model to be used by the voice assistant. All Deepgram models are run on-premise.
     *
     * - `deepgram/flux` is optimized for turn-taking with multilingual language hints.
     * - `deepgram/nova-3` is multilingual with automatic language detection.
     * - `deepgram/nova-2` is Deepgram's previous-generation multilingual model.
     * - `azure/fast` is a multilingual Azure transcription model.
     * - `assemblyai/universal-streaming` is a multilingual streaming model with configurable turn detection.
     * - `xai/grok-stt` is a multilingual Grok STT model.
     *
     * @var value-of<Model>|null $model
     */
    #[Optional(enum: Model::class)]
    public ?string $model;

    /**
     * Region on third party cloud providers (currently Azure) if using one of their models. Some regions require `api_key_ref`.
     */
    #[Optional]
    public ?string $region;

    #[Optional]
    public ?TranscriptionSettingsConfig $settings;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Model|value-of<Model>|null $model
     * @param TranscriptionSettingsConfig|TranscriptionSettingsConfigShape|null $settings
     */
    public static function with(
        ?string $apiKeyRef = null,
        ?string $language = null,
        Model|string|null $model = null,
        ?string $region = null,
        TranscriptionSettingsConfig|array|null $settings = null,
    ): self {
        $self = new self;

        null !== $apiKeyRef && $self['apiKeyRef'] = $apiKeyRef;
        null !== $language && $self['language'] = $language;
        null !== $model && $self['model'] = $model;
        null !== $region && $self['region'] = $region;
        null !== $settings && $self['settings'] = $settings;

        return $self;
    }

    /**
     * Integration secret identifier for the transcription provider API key. Currently used for Azure transcription regions that require a customer-provided API key.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * The language of the audio to be transcribed. If not set, or if set to `auto`, supported models will automatically detect the language. For `deepgram/flux`, supported values are: `auto` (Telnyx language detection controls the language hint), `multi` (no language hint), and language-specific hints `en`, `es`, `fr`, `de`, `hi`, `ru`, `pt`, `ja`, `it`, and `nl`.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The speech to text model to be used by the voice assistant. All Deepgram models are run on-premise.
     *
     * - `deepgram/flux` is optimized for turn-taking with multilingual language hints.
     * - `deepgram/nova-3` is multilingual with automatic language detection.
     * - `deepgram/nova-2` is Deepgram's previous-generation multilingual model.
     * - `azure/fast` is a multilingual Azure transcription model.
     * - `assemblyai/universal-streaming` is a multilingual streaming model with configurable turn detection.
     * - `xai/grok-stt` is a multilingual Grok STT model.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Region on third party cloud providers (currently Azure) if using one of their models. Some regions require `api_key_ref`.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * @param TranscriptionSettingsConfig|TranscriptionSettingsConfigShape $settings
     */
    public function withSettings(
        TranscriptionSettingsConfig|array $settings
    ): self {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }
}
