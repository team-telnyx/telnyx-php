<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The settings associated with speech to text for the voice assistant. This is only relevant if the assistant uses a text-to-text language model. Any assistant using a model with native audio support (e.g. `fixie-ai/ultravox-v0_4`) will ignore this field.
 *
 * @phpstan-type transcription_config = array{model?: string|null}
 */
final class TranscriptionConfig implements BaseModel
{
    /** @use SdkModel<transcription_config> */
    use SdkModel;

    /**
     * The speech to text model to be used by the voice assistant.
     *
     * - `distil-whisper/distil-large-v2` is lower latency but English-only.
     * - `openai/whisper-large-v3-turbo` is multi-lingual with automatic language detection but slightly higher latency.
     * - `google` is a multi-lingual option, please describe the language in the `language` field.
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
    public static function with(?string $model = null): self
    {
        $obj = new self;

        null !== $model && $obj->model = $model;

        return $obj;
    }

    /**
     * The speech to text model to be used by the voice assistant.
     *
     * - `distil-whisper/distil-large-v2` is lower latency but English-only.
     * - `openai/whisper-large-v3-turbo` is multi-lingual with automatic language detection but slightly higher latency.
     * - `google` is a multi-lingual option, please describe the language in the `language` field.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj->model = $model;

        return $obj;
    }
}
