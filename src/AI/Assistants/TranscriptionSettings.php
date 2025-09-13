<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type transcription_settings = array{language?: string, model?: string}
 */
final class TranscriptionSettings implements BaseModel
{
    /** @use SdkModel<transcription_settings> */
    use SdkModel;

    /**
     * The language of the audio to be transcribed. This is only applicable for `openai/whisper-large-v3-turbo` model. If not set, of if set to `auto`, the model will automatically detect the language. For the full list of supported languages, see the [whisper tokenizer](https://github.com/openai/whisper/blob/main/whisper/tokenizer.py).
     */
    #[Api(optional: true)]
    public ?string $language;

    /**
     * The speech to text model to be used by the voice assistant.
     *
     * - `distil-whisper/distil-large-v2` is lower latency but English-only.
     * - `openai/whisper-large-v3-turbo` is multi-lingual with automatic language detection but slightly higher latency.
     */
    #[Api(optional: true)]
    public ?string $model;

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
        ?string $language = null,
        ?string $model = null
    ): self {
        $obj = new self;

        null !== $language && $obj->language = $language;
        null !== $model && $obj->model = $model;

        return $obj;
    }

    /**
     * The language of the audio to be transcribed. This is only applicable for `openai/whisper-large-v3-turbo` model. If not set, of if set to `auto`, the model will automatically detect the language. For the full list of supported languages, see the [whisper tokenizer](https://github.com/openai/whisper/blob/main/whisper/tokenizer.py).
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj->language = $language;

        return $obj;
    }

    /**
     * The speech to text model to be used by the voice assistant.
     *
     * - `distil-whisper/distil-large-v2` is lower latency but English-only.
     * - `openai/whisper-large-v3-turbo` is multi-lingual with automatic language detection but slightly higher latency.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj->model = $model;

        return $obj;
    }
}
