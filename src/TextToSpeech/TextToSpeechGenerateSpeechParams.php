<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Converts the provided text to speech using the specified voice and returns audio data.
 *
 * @see Telnyx\TextToSpeechService::generateSpeech()
 *
 * @phpstan-type TextToSpeechGenerateSpeechParamsShape = array{
 *   text: string, voice: string
 * }
 */
final class TextToSpeechGenerateSpeechParams implements BaseModel
{
    /** @use SdkModel<TextToSpeechGenerateSpeechParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The text to convert to speech.
     */
    #[Api]
    public string $text;

    /**
     * The voice ID in the format Provider.ModelId.VoiceId.
     *
     * Examples:
     * - AWS.Polly.Joanna-Neural
     * - Azure.en-US-AvaMultilingualNeural
     * - ElevenLabs.eleven_multilingual_v2.Rachel
     * - Telnyx.KokoroTTS.af
     *
     * Use the `GET /text-to-speech/voices` endpoint to get a complete list of available voices.
     */
    #[Api]
    public string $voice;

    /**
     * `new TextToSpeechGenerateSpeechParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TextToSpeechGenerateSpeechParams::with(text: ..., voice: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TextToSpeechGenerateSpeechParams)->withText(...)->withVoice(...)
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
    public static function with(string $text, string $voice): self
    {
        $obj = new self;

        $obj->text = $text;
        $obj->voice = $voice;

        return $obj;
    }

    /**
     * The text to convert to speech.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }

    /**
     * The voice ID in the format Provider.ModelId.VoiceId.
     *
     * Examples:
     * - AWS.Polly.Joanna-Neural
     * - Azure.en-US-AvaMultilingualNeural
     * - ElevenLabs.eleven_multilingual_v2.Rachel
     * - Telnyx.KokoroTTS.af
     *
     * Use the `GET /text-to-speech/voices` endpoint to get a complete list of available voices.
     */
    public function withVoice(string $voice): self
    {
        $obj = clone $this;
        $obj->voice = $voice;

        return $obj;
    }
}
