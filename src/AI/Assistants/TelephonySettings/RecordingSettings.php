<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TelephonySettings;

use Telnyx\AI\Assistants\TelephonySettings\RecordingSettings\Channels;
use Telnyx\AI\Assistants\TelephonySettings\RecordingSettings\Format;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for call recording format and channel settings.
 *
 * @phpstan-type RecordingSettingsShape = array{
 *   channels?: null|Channels|value-of<Channels>,
 *   format?: null|Format|value-of<Format>,
 * }
 */
final class RecordingSettings implements BaseModel
{
    /** @use SdkModel<RecordingSettingsShape> */
    use SdkModel;

    /**
     * The number of channels for the recording. 'single' for mono, 'dual' for stereo.
     *
     * @var value-of<Channels>|null $channels
     */
    #[Optional(enum: Channels::class)]
    public ?string $channels;

    /**
     * The format of the recording file.
     *
     * @var value-of<Format>|null $format
     */
    #[Optional(enum: Format::class)]
    public ?string $format;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Channels|value-of<Channels>|null $channels
     * @param Format|value-of<Format>|null $format
     */
    public static function with(
        Channels|string|null $channels = null,
        Format|string|null $format = null
    ): self {
        $self = new self;

        null !== $channels && $self['channels'] = $channels;
        null !== $format && $self['format'] = $format;

        return $self;
    }

    /**
     * The number of channels for the recording. 'single' for mono, 'dual' for stereo.
     *
     * @param Channels|value-of<Channels> $channels
     */
    public function withChannels(Channels|string $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * The format of the recording file.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }
}
