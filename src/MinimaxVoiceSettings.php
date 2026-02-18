<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MinimaxVoiceSettings\LanguageBoost;
use Telnyx\MinimaxVoiceSettings\Type;

/**
 * @phpstan-type MinimaxVoiceSettingsShape = array{
 *   type: Type|value-of<Type>,
 *   languageBoost?: null|LanguageBoost|value-of<LanguageBoost>,
 *   pitch?: int|null,
 *   speed?: float|null,
 *   vol?: float|null,
 * }
 */
final class MinimaxVoiceSettings implements BaseModel
{
    /** @use SdkModel<MinimaxVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Enhances recognition for specific languages and dialects during MiniMax TTS synthesis. Default is null (no boost). Set to 'auto' for automatic language detection.
     *
     * @var value-of<LanguageBoost>|null $languageBoost
     */
    #[Optional('language_boost', enum: LanguageBoost::class, nullable: true)]
    public ?string $languageBoost;

    /**
     * Voice pitch adjustment. Default is 0.
     */
    #[Optional]
    public ?int $pitch;

    /**
     * Speech speed multiplier. Default is 1.0.
     */
    #[Optional]
    public ?float $speed;

    /**
     * Speech volume multiplier. Default is 1.0.
     */
    #[Optional]
    public ?float $vol;

    /**
     * `new MinimaxVoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MinimaxVoiceSettings::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MinimaxVoiceSettings)->withType(...)
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
     * @param Type|value-of<Type> $type
     * @param LanguageBoost|value-of<LanguageBoost>|null $languageBoost
     */
    public static function with(
        Type|string $type,
        LanguageBoost|string|null $languageBoost = null,
        ?int $pitch = null,
        ?float $speed = null,
        ?float $vol = null,
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $languageBoost && $self['languageBoost'] = $languageBoost;
        null !== $pitch && $self['pitch'] = $pitch;
        null !== $speed && $self['speed'] = $speed;
        null !== $vol && $self['vol'] = $vol;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Enhances recognition for specific languages and dialects during MiniMax TTS synthesis. Default is null (no boost). Set to 'auto' for automatic language detection.
     *
     * @param LanguageBoost|value-of<LanguageBoost>|null $languageBoost
     */
    public function withLanguageBoost(
        LanguageBoost|string|null $languageBoost
    ): self {
        $self = clone $this;
        $self['languageBoost'] = $languageBoost;

        return $self;
    }

    /**
     * Voice pitch adjustment. Default is 0.
     */
    public function withPitch(int $pitch): self
    {
        $self = clone $this;
        $self['pitch'] = $pitch;

        return $self;
    }

    /**
     * Speech speed multiplier. Default is 1.0.
     */
    public function withSpeed(float $speed): self
    {
        $self = clone $this;
        $self['speed'] = $speed;

        return $self;
    }

    /**
     * Speech volume multiplier. Default is 1.0.
     */
    public function withVol(float $vol): self
    {
        $self = clone $this;
        $self['vol'] = $vol;

        return $self;
    }
}
