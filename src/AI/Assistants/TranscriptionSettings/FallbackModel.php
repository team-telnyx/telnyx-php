<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings;

use Telnyx\AI\Assistants\TranscriptionSettings\FallbackModel\Model;
use Telnyx\AI\Assistants\TranscriptionSettingsConfig;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * A streaming speech-to-text model that takes over transcription when the model in use fails.
 *
 * @phpstan-import-type TranscriptionSettingsConfigShape from \Telnyx\AI\Assistants\TranscriptionSettingsConfig
 *
 * @phpstan-type FallbackModelShape = array{
 *   model: \Telnyx\AI\Assistants\TranscriptionSettings\FallbackModel\Model|value-of<\Telnyx\AI\Assistants\TranscriptionSettings\FallbackModel\Model>,
 *   language?: string|null,
 *   settings?: null|TranscriptionSettingsConfig|TranscriptionSettingsConfigShape,
 * }
 */
final class FallbackModel implements BaseModel
{
    /** @use SdkModel<FallbackModelShape> */
    use SdkModel;

    /**
     * The fallback model. It must be a streaming model other than `transcription.model` and the other fallbacks: `deepgram/flux`, `deepgram/nova-3`, `deepgram/nova-2`, `assemblyai/universal-3-5-pro` (or its legacy alias `assemblyai/universal-streaming`), `xai/grok-stt`, `soniox/stt-rt-v4`, `soniox/stt-rt-v5`, `humain/realtime`, or `reson8/turns`.
     *
     * @var value-of<Model> $model
     */
    #[Required(
        enum: Model::class
    )]
    public string $model;

    /**
     * The language the fallback transcribes. Omit it or set it to `null` to use the language of `transcription.model`. The request is rejected when the fallback model doesn't support the language it would run.
     */
    #[Optional(nullable: true)]
    public ?string $language;

    /**
     * Settings for the fallback, with the same fields and limits as `transcription.settings`. Fields that don't apply to this model's provider are dropped, and the provider's defaults fill in the rest. Omit it or set it to `null` to use the settings of `transcription.model` where they apply to this model.
     */
    #[Optional(nullable: true)]
    public ?TranscriptionSettingsConfig $settings;

    /**
     * `new FallbackModel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FallbackModel::with(model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FallbackModel)->withModel(...)
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
     * @param Model|value-of<Model> $model
     * @param Omitted|TranscriptionSettingsConfig|TranscriptionSettingsConfigShape|null $settings
     */
    public static function with(
        Model|string $model,
        string|Omitted|null $language = Omitted::VALUE,
        Omitted|TranscriptionSettingsConfig|array|null $settings = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['model'] = $model;

        Omitted::VALUE !== $language && $self['language'] = $language;
        Omitted::VALUE !== $settings && $self['settings'] = $settings;

        return $self;
    }

    /**
     * The fallback model. It must be a streaming model other than `transcription.model` and the other fallbacks: `deepgram/flux`, `deepgram/nova-3`, `deepgram/nova-2`, `assemblyai/universal-3-5-pro` (or its legacy alias `assemblyai/universal-streaming`), `xai/grok-stt`, `soniox/stt-rt-v4`, `soniox/stt-rt-v5`, `humain/realtime`, or `reson8/turns`.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(
        Model|string $model,
    ): self {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * The language the fallback transcribes. Omit it or set it to `null` to use the language of `transcription.model`. The request is rejected when the fallback model doesn't support the language it would run.
     */
    public function withLanguage(?string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Settings for the fallback, with the same fields and limits as `transcription.settings`. Fields that don't apply to this model's provider are dropped, and the provider's defaults fill in the rest. Omit it or set it to `null` to use the settings of `transcription.model` where they apply to this model.
     *
     * @param TranscriptionSettingsConfig|TranscriptionSettingsConfigShape|null $settings
     */
    public function withSettings(
        TranscriptionSettingsConfig|array|null $settings
    ): self {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }
}
