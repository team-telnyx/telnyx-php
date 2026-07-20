<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Calls\Actions\TranscriptionConfig\Model;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
 *
 * @phpstan-type TranscriptionConfigShape = array{
 *   language?: string|null, model?: null|Model|value-of<Model>
 * }
 */
final class TranscriptionConfig implements BaseModel
{
    /** @use SdkModel<TranscriptionConfigShape> */
    use SdkModel;

    /**
     * The language of the audio to be transcribed. If not set, or if set to `auto`, supported models will automatically detect the language. Supported and meaningful values depend on the selected transcription `model`. For `deepgram/flux`, supported values are: `auto` (Telnyx language detection controls the language hint), `multi` (no language hint), and language-specific hints `en`, `es`, `fr`, `de`, `hi`, `ru`, `pt`, `ja`, `it`, and `nl`. For `soniox/stt-rt-v4`, `auto` omits the language hint and lets Soniox auto-detect; ISO 639-1 codes (e.g. `en`, `es`) bias detection toward that language. For `assemblyai/universal-streaming`, `auto` (or unset) enables native multilingual code-switching; ISO 639-1 codes (`en`, `es`, `de`, `fr`, `pt`, `it`, `tr`, `nl`, `sv`, `no`, `da`, `fi`, `hi`, `vi`, `ar`, `he`, `ja`, `zh`) bias the session to that language.
     */
    #[Optional]
    public ?string $language;

    /**
     * The speech to text model to be used by the voice assistant. Supported models include:
     *
     * - `deepgram/flux` (or `flux`) for live streaming turn-taking.
     * - `deepgram/nova-3` and `deepgram/nova-2` for live streaming transcription.
     * - `speechmatics/standard` and `speechmatics/enhanced` for live streaming transcription.
     * - `assemblyai/universal-streaming` for live streaming transcription.
     * - `xai/grok-stt` for live streaming transcription.
     * - `soniox/stt-rt-v4` for live streaming multilingual transcription with automatic language detection.
     * - `nvidia/parakeet-v3` for multilingual transcription with automatic language detection.
     * - `azure/fast` and `azure/realtime`; Azure models require `region`, and unsupported regions require `api_key_ref`.
     * - `google/latest_long` for non-streaming multilingual transcription.
     * - `distil-whisper/distil-large-v2` for lower-latency English-only non-streaming transcription.
     * - `openai/whisper-large-v3-turbo` for multilingual non-streaming transcription with automatic language detection.
     *
     * @var value-of<Model>|null $model
     */
    #[Optional(enum: Model::class)]
    public ?string $model;

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
     */
    public static function with(
        ?string $language = null,
        Model|string|null $model = null
    ): self {
        $self = new self;

        null !== $language && $self['language'] = $language;
        null !== $model && $self['model'] = $model;

        return $self;
    }

    /**
     * The language of the audio to be transcribed. If not set, or if set to `auto`, supported models will automatically detect the language. Supported and meaningful values depend on the selected transcription `model`. For `deepgram/flux`, supported values are: `auto` (Telnyx language detection controls the language hint), `multi` (no language hint), and language-specific hints `en`, `es`, `fr`, `de`, `hi`, `ru`, `pt`, `ja`, `it`, and `nl`. For `soniox/stt-rt-v4`, `auto` omits the language hint and lets Soniox auto-detect; ISO 639-1 codes (e.g. `en`, `es`) bias detection toward that language. For `assemblyai/universal-streaming`, `auto` (or unset) enables native multilingual code-switching; ISO 639-1 codes (`en`, `es`, `de`, `fr`, `pt`, `it`, `tr`, `nl`, `sv`, `no`, `da`, `fi`, `hi`, `vi`, `ar`, `he`, `ja`, `zh`) bias the session to that language.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * The speech to text model to be used by the voice assistant. Supported models include:
     *
     * - `deepgram/flux` (or `flux`) for live streaming turn-taking.
     * - `deepgram/nova-3` and `deepgram/nova-2` for live streaming transcription.
     * - `speechmatics/standard` and `speechmatics/enhanced` for live streaming transcription.
     * - `assemblyai/universal-streaming` for live streaming transcription.
     * - `xai/grok-stt` for live streaming transcription.
     * - `soniox/stt-rt-v4` for live streaming multilingual transcription with automatic language detection.
     * - `nvidia/parakeet-v3` for multilingual transcription with automatic language detection.
     * - `azure/fast` and `azure/realtime`; Azure models require `region`, and unsupported regions require `api_key_ref`.
     * - `google/latest_long` for non-streaming multilingual transcription.
     * - `distil-whisper/distil-large-v2` for lower-latency English-only non-streaming transcription.
     * - `openai/whisper-large-v3-turbo` for multilingual non-streaming transcription with automatic language detection.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }
}
