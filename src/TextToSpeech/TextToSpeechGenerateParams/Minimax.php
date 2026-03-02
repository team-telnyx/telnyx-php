<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechGenerateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Minimax provider-specific parameters.
 *
 * @phpstan-type MinimaxShape = array{
 *   languageBoost?: string|null,
 *   pitch?: int|null,
 *   responseFormat?: string|null,
 *   speed?: float|null,
 *   vol?: float|null,
 * }
 */
final class Minimax implements BaseModel
{
    /** @use SdkModel<MinimaxShape> */
    use SdkModel;

    /**
     * Language code to boost pronunciation for.
     */
    #[Optional('language_boost')]
    public ?string $languageBoost;

    /**
     * Pitch adjustment.
     */
    #[Optional]
    public ?int $pitch;

    /**
     * Audio output format.
     */
    #[Optional('response_format')]
    public ?string $responseFormat;

    /**
     * Speech speed multiplier.
     */
    #[Optional]
    public ?float $speed;

    /**
     * Volume level.
     */
    #[Optional]
    public ?float $vol;

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
        ?string $languageBoost = null,
        ?int $pitch = null,
        ?string $responseFormat = null,
        ?float $speed = null,
        ?float $vol = null,
    ): self {
        $self = new self;

        null !== $languageBoost && $self['languageBoost'] = $languageBoost;
        null !== $pitch && $self['pitch'] = $pitch;
        null !== $responseFormat && $self['responseFormat'] = $responseFormat;
        null !== $speed && $self['speed'] = $speed;
        null !== $vol && $self['vol'] = $vol;

        return $self;
    }

    /**
     * Language code to boost pronunciation for.
     */
    public function withLanguageBoost(string $languageBoost): self
    {
        $self = clone $this;
        $self['languageBoost'] = $languageBoost;

        return $self;
    }

    /**
     * Pitch adjustment.
     */
    public function withPitch(int $pitch): self
    {
        $self = clone $this;
        $self['pitch'] = $pitch;

        return $self;
    }

    /**
     * Audio output format.
     */
    public function withResponseFormat(string $responseFormat): self
    {
        $self = clone $this;
        $self['responseFormat'] = $responseFormat;

        return $self;
    }

    /**
     * Speech speed multiplier.
     */
    public function withSpeed(float $speed): self
    {
        $self = clone $this;
        $self['speed'] = $speed;

        return $self;
    }

    /**
     * Volume level.
     */
    public function withVol(float $vol): self
    {
        $self = clone $this;
        $self['vol'] = $vol;

        return $self;
    }
}
