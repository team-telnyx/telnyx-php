<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Use this field to modify sound effects, for example adjust the pitch.
 *
 * @phpstan-type sound_modifications = array{
 *   octaves?: float, pitch?: float, semitone?: float, track?: string
 * }
 */
final class SoundModifications implements BaseModel
{
    /** @use SdkModel<sound_modifications> */
    use SdkModel;

    /**
     * Adjust the pitch in octaves, values should be between -1 and 1, default 0.
     */
    #[Api(optional: true)]
    public ?float $octaves;

    /**
     * Set the pitch directly, value should be > 0, default 1 (lower = lower tone).
     */
    #[Api(optional: true)]
    public ?float $pitch;

    /**
     * Adjust the pitch in semitones, values should be between -14 and 14, default 0.
     */
    #[Api(optional: true)]
    public ?float $semitone;

    /**
     * The track to which the sound modifications will be applied. Accepted values are `inbound` or `outbound`.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $octaves && $obj->octaves = $octaves;
        null !== $pitch && $obj->pitch = $pitch;
        null !== $semitone && $obj->semitone = $semitone;
        null !== $track && $obj->track = $track;

        return $obj;
    }

    /**
     * Adjust the pitch in octaves, values should be between -1 and 1, default 0.
     */
    public function withOctaves(float $octaves): self
    {
        $obj = clone $this;
        $obj->octaves = $octaves;

        return $obj;
    }

    /**
     * Set the pitch directly, value should be > 0, default 1 (lower = lower tone).
     */
    public function withPitch(float $pitch): self
    {
        $obj = clone $this;
        $obj->pitch = $pitch;

        return $obj;
    }

    /**
     * Adjust the pitch in semitones, values should be between -14 and 14, default 0.
     */
    public function withSemitone(float $semitone): self
    {
        $obj = clone $this;
        $obj->semitone = $semitone;

        return $obj;
    }

    /**
     * The track to which the sound modifications will be applied. Accepted values are `inbound` or `outbound`.
     */
    public function withTrack(string $track): self
    {
        $obj = clone $this;
        $obj->track = $track;

        return $obj;
    }
}
