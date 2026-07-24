<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TextToSpeech\TextToSpeechGenerateSpeechParams\Humain\VoiceID;

/**
 * Humain provider-specific parameters. Unlike other providers, Humain has no format/sample-rate negotiation (output is always PCM16 24kHz mono) and no language parameter — language is fixed per voice.
 *
 * @phpstan-type HumainShape = array{
 *   voiceID: VoiceID|value-of<VoiceID>, ttfbEagerness?: float|null
 * }
 */
final class Humain implements BaseModel
{
    /** @use SdkModel<HumainShape> */
    use SdkModel;

    /**
     * Humain voice identifier.
     *
     * @var value-of<VoiceID> $voiceID
     */
    #[Required('voice_id', enum: VoiceID::class)]
    public string $voiceID;

    /**
     * Time-to-first-byte eagerness, trading synthesis latency for quality.
     */
    #[Optional('ttfb_eagerness')]
    public ?float $ttfbEagerness;

    /**
     * `new Humain()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Humain::with(voiceID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Humain)->withVoiceID(...)
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
     * @param VoiceID|value-of<VoiceID> $voiceID
     */
    public static function with(
        VoiceID|string $voiceID,
        ?float $ttfbEagerness = null
    ): self {
        $self = new self;

        $self['voiceID'] = $voiceID;

        null !== $ttfbEagerness && $self['ttfbEagerness'] = $ttfbEagerness;

        return $self;
    }

    /**
     * Humain voice identifier.
     *
     * @param VoiceID|value-of<VoiceID> $voiceID
     */
    public function withVoiceID(VoiceID|string $voiceID): self
    {
        $self = clone $this;
        $self['voiceID'] = $voiceID;

        return $self;
    }

    /**
     * Time-to-first-byte eagerness, trading synthesis latency for quality.
     */
    public function withTtfbEagerness(float $ttfbEagerness): self
    {
        $self = clone $this;
        $self['ttfbEagerness'] = $ttfbEagerness;

        return $self;
    }
}
