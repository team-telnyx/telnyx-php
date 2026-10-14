<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TranscriptionSettings;

use Telnyx\AI\Assistants\TranscriptionSettings\Challenger\Model;
use Telnyx\AI\Assistants\TranscriptionSettings\Challenger\Rule;
use Telnyx\AI\Assistants\TranscriptionSettingsConfig;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * A second speech-to-text model that transcribes alongside `transcription.model`, and the rule that decides which transcript the assistant uses.
 *
 * @phpstan-import-type TranscriptionSettingsConfigShape from \Telnyx\AI\Assistants\TranscriptionSettingsConfig
 *
 * @phpstan-type ChallengerShape = array{
 *   model: \Telnyx\AI\Assistants\TranscriptionSettings\Challenger\Model|value-of<\Telnyx\AI\Assistants\TranscriptionSettings\Challenger\Model>,
 *   language?: string|null,
 *   rule?: null|Rule|value-of<Rule>,
 *   settings?: null|TranscriptionSettingsConfig|TranscriptionSettingsConfigShape,
 * }
 */
final class Challenger implements BaseModel
{
    /** @use SdkModel<ChallengerShape> */
    use SdkModel;

    /**
     * The language booster's model. It must be the same kind of model as `transcription.model`: both streaming (`deepgram/flux`, `deepgram/nova-3`, `deepgram/nova-2`, `assemblyai/universal-3-5-pro` or its legacy alias `assemblyai/universal-streaming`, `xai/grok-stt`, `soniox/stt-rt-v4`, `soniox/stt-rt-v5`, `humain/realtime`, `reson8/turns`) or both non-streaming (`azure/fast`, `nvidia/parakeet-v3`, `omi-health/omi-med-stt-v1`, `cohere/ar-stt`, `distil-whisper/distil-large-v2`, `openai/whisper-large-v3-turbo`, `telnyx/basira`). It can be the same model as `transcription.model` on a different `language`.
     *
     * @var value-of<Model> $model
     */
    #[Required(
        enum: Model::class
    )]
    public string $model;

    /**
     * The language this model transcribes. Omit it or set it to `null` to use the language of `transcription.model`. The request is rejected when this model doesn't support the language it would run. It is also rejected when it would run the same model on the same language as `transcription.model`.
     */
    #[Optional(nullable: true)]
    public ?string $language;

    /**
     * How the assistant picks the transcript it uses. The models are compared on how complete and confident their transcripts are, not on language, so the rules work best when both models understand the callers' language.
     *
     * - `best_turn` (default): both models transcribe the whole call. Each turn uses the language booster's transcript only when it scores higher than the transcript of `transcription.model` (clearly higher with non-streaming models). With streaming models, `transcription.model` also decides when each turn ends. Available for every pair.
     * - `best_engine`: both models transcribe the first turns, then the call continues alone on the model whose transcripts scored higher. If neither clearly leads, `transcription.model` continues. Streaming models only.
     * - `merge_words`: both models transcribe each utterance and their words are merged, keeping Arabic and English spoken in the same sentence. Available only for `telnyx/basira` with `cohere/ar-stt`, in either order. The pair runs on the language that applies to `telnyx/basira` (its own, or that of `transcription.model`), which must be Arabic (`ar` or an `ar-` locale), `multi`, or `auto`.
     *
     * @var value-of<Rule>|null $rule
     */
    #[Optional(enum: Rule::class)]
    public ?string $rule;

    /**
     * Settings for the language booster, with the same fields and limits as `transcription.settings`. Fields that don't apply to this model's provider are dropped, and the provider's defaults fill in the rest. Omit it or set it to `null` to use the settings of `transcription.model` where they apply to this model.
     */
    #[Optional(nullable: true)]
    public ?TranscriptionSettingsConfig $settings;

    /**
     * `new Challenger()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Challenger::with(model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Challenger)->withModel(...)
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
     * @param Rule|value-of<Rule>|null $rule
     */
    public static function with(
        Model|string $model,
        string|Omitted|null $language = Omitted::VALUE,
        Omitted|TranscriptionSettingsConfig|array|null $settings = Omitted::VALUE,
        Rule|string|null $rule = null,
    ): self {
        $self = new self;

        $self['model'] = $model;

        Omitted::VALUE !== $language && $self['language'] = $language;
        null !== $rule && $self['rule'] = $rule;
        Omitted::VALUE !== $settings && $self['settings'] = $settings;

        return $self;
    }

    /**
     * The language booster's model. It must be the same kind of model as `transcription.model`: both streaming (`deepgram/flux`, `deepgram/nova-3`, `deepgram/nova-2`, `assemblyai/universal-3-5-pro` or its legacy alias `assemblyai/universal-streaming`, `xai/grok-stt`, `soniox/stt-rt-v4`, `soniox/stt-rt-v5`, `humain/realtime`, `reson8/turns`) or both non-streaming (`azure/fast`, `nvidia/parakeet-v3`, `omi-health/omi-med-stt-v1`, `cohere/ar-stt`, `distil-whisper/distil-large-v2`, `openai/whisper-large-v3-turbo`, `telnyx/basira`). It can be the same model as `transcription.model` on a different `language`.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(
        Model|string $model
    ): self {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * The language this model transcribes. Omit it or set it to `null` to use the language of `transcription.model`. The request is rejected when this model doesn't support the language it would run. It is also rejected when it would run the same model on the same language as `transcription.model`.
     */
    public function withLanguage(?string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * How the assistant picks the transcript it uses. The models are compared on how complete and confident their transcripts are, not on language, so the rules work best when both models understand the callers' language.
     *
     * - `best_turn` (default): both models transcribe the whole call. Each turn uses the language booster's transcript only when it scores higher than the transcript of `transcription.model` (clearly higher with non-streaming models). With streaming models, `transcription.model` also decides when each turn ends. Available for every pair.
     * - `best_engine`: both models transcribe the first turns, then the call continues alone on the model whose transcripts scored higher. If neither clearly leads, `transcription.model` continues. Streaming models only.
     * - `merge_words`: both models transcribe each utterance and their words are merged, keeping Arabic and English spoken in the same sentence. Available only for `telnyx/basira` with `cohere/ar-stt`, in either order. The pair runs on the language that applies to `telnyx/basira` (its own, or that of `transcription.model`), which must be Arabic (`ar` or an `ar-` locale), `multi`, or `auto`.
     *
     * @param Rule|value-of<Rule> $rule
     */
    public function withRule(Rule|string $rule): self
    {
        $self = clone $this;
        $self['rule'] = $rule;

        return $self;
    }

    /**
     * Settings for the language booster, with the same fields and limits as `transcription.settings`. Fields that don't apply to this model's provider are dropped, and the provider's defaults fill in the rest. Omit it or set it to `null` to use the settings of `transcription.model` where they apply to this model.
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
