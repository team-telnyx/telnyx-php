<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Language-specific speech and transcription settings for Conversation Relay.
 *
 * @phpstan-type LanguageShape = array{
 *   code?: string|null,
 *   speechModel?: string|null,
 *   transcriptionProvider?: string|null,
 *   ttsProvider?: string|null,
 *   voice?: string|null,
 * }
 */
final class Language implements BaseModel
{
    /** @use SdkModel<LanguageShape> */
    use SdkModel;

    /**
     * BCP 47 language code.
     */
    #[Optional]
    public ?string $code;

    /**
     * Speech recognition model for this language.
     */
    #[Optional('speech_model')]
    public ?string $speechModel;

    /**
     * Speech-to-text provider for this language.
     */
    #[Optional('transcription_provider')]
    public ?string $transcriptionProvider;

    /**
     * Text-to-speech provider for this language.
     */
    #[Optional('tts_provider')]
    public ?string $ttsProvider;

    /**
     * Voice identifier for this language.
     */
    #[Optional]
    public ?string $voice;

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
        ?string $code = null,
        ?string $speechModel = null,
        ?string $transcriptionProvider = null,
        ?string $ttsProvider = null,
        ?string $voice = null,
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $speechModel && $self['speechModel'] = $speechModel;
        null !== $transcriptionProvider && $self['transcriptionProvider'] = $transcriptionProvider;
        null !== $ttsProvider && $self['ttsProvider'] = $ttsProvider;
        null !== $voice && $self['voice'] = $voice;

        return $self;
    }

    /**
     * BCP 47 language code.
     */
    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Speech recognition model for this language.
     */
    public function withSpeechModel(string $speechModel): self
    {
        $self = clone $this;
        $self['speechModel'] = $speechModel;

        return $self;
    }

    /**
     * Speech-to-text provider for this language.
     */
    public function withTranscriptionProvider(
        string $transcriptionProvider
    ): self {
        $self = clone $this;
        $self['transcriptionProvider'] = $transcriptionProvider;

        return $self;
    }

    /**
     * Text-to-speech provider for this language.
     */
    public function withTtsProvider(string $ttsProvider): self
    {
        $self = clone $this;
        $self['ttsProvider'] = $ttsProvider;

        return $self;
    }

    /**
     * Voice identifier for this language.
     */
    public function withVoice(string $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }
}
