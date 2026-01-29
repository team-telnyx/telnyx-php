<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingResponseData;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Links to download the recording files.
 *
 * @phpstan-type DownloadURLsShape = array{mp3?: string|null, wav?: string|null}
 */
final class DownloadURLs implements BaseModel
{
    /** @use SdkModel<DownloadURLsShape> */
    use SdkModel;

    /**
     * Link to download the recording in mp3 format.
     */
    #[Optional]
    public ?string $mp3;

    /**
     * Link to download the recording in wav format.
     */
    #[Optional]
    public ?string $wav;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $mp3 = null, ?string $wav = null): self
    {
        $self = new self;

        null !== $mp3 && $self['mp3'] = $mp3;
        null !== $wav && $self['wav'] = $wav;

        return $self;
    }

    /**
     * Link to download the recording in mp3 format.
     */
    public function withMP3(string $mp3): self
    {
        $self = clone $this;
        $self['mp3'] = $mp3;

        return $self;
    }

    /**
     * Link to download the recording in wav format.
     */
    public function withWav(string $wav): self
    {
        $self = clone $this;
        $self['wav'] = $wav;

        return $self;
    }
}
