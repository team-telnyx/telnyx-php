<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Speech-to-text settings for Conversation Relay.
 *
 * @phpstan-type TranscriptionShape = array{
 *   language?: string|null, model?: string|null, provider?: string|null
 * }
 */
final class Transcription implements BaseModel
{
    /** @use SdkModel<TranscriptionShape> */
    use SdkModel;

    /**
     * Transcription language.
     */
    #[Optional]
    public ?string $language;

    /**
     * Transcription model to use.
     */
    #[Optional]
    public ?string $model;

    /**
     * Transcription provider to use.
     */
    #[Optional]
    public ?string $provider;

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
        ?string $model = null,
        ?string $provider = null
    ): self {
        $self = new self;

        null !== $language && $self['language'] = $language;
        null !== $model && $self['model'] = $model;
        null !== $provider && $self['provider'] = $provider;

        return $self;
    }

    /**
     * Transcription language.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Transcription model to use.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Transcription provider to use.
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}
