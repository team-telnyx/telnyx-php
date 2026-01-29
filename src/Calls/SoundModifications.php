<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Use this field to modify sound effects, for example adjust the pitch.
 *
 * @phpstan-type SoundModificationsShape = array{
 *   octaves?: float|null,
 *   pitch?: float|null,
 *   semitone?: float|null,
 *   track?: string|null,
 * }
 */
final class SoundModifications implements BaseModel
{
    /** @use SdkModel<SoundModificationsShape> */
    use SdkModel;

    /**
     * Adjust the pitch in octaves, values should be between -1 and 1, default 0.
     */
    #[Optional]
    public ?float $octaves;

    /**
     * Set the pitch directly, value should be > 0, default 1 (lower = lower tone).
     */
    #[Optional]
    public ?float $pitch;

    /**
     * Adjust the pitch in semitones, values should be between -14 and 14, default 0.
     */
    #[Optional]
    public ?float $semitone;

    /**
     * The track to which the sound modifications will be applied. Accepted values are `inbound` or `outbound`.
     */
    #[Optional]
    public ?string $track;

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
        ?float $octaves = null,
        ?float $pitch = null,
        ?float $semitone = null,
        ?string $track = null,
    ): self {
        $self = new self;

        null !== $octaves && $self['octaves'] = $octaves;
        null !== $pitch && $self['pitch'] = $pitch;
        null !== $semitone && $self['semitone'] = $semitone;
        null !== $track && $self['track'] = $track;

        return $self;
    }

    /**
     * Adjust the pitch in octaves, values should be between -1 and 1, default 0.
     */
    public function withOctaves(float $octaves): self
    {
        $self = clone $this;
        $self['octaves'] = $octaves;

        return $self;
    }

    /**
     * Set the pitch directly, value should be > 0, default 1 (lower = lower tone).
     */
    public function withPitch(float $pitch): self
    {
        $self = clone $this;
        $self['pitch'] = $pitch;

        return $self;
    }

    /**
     * Adjust the pitch in semitones, values should be between -14 and 14, default 0.
     */
    public function withSemitone(float $semitone): self
    {
        $self = clone $this;
        $self['semitone'] = $semitone;

        return $self;
    }

    /**
     * The track to which the sound modifications will be applied. Accepted values are `inbound` or `outbound`.
     */
    public function withTrack(string $track): self
    {
        $self = clone $this;
        $self['track'] = $track;

        return $self;
    }
}
