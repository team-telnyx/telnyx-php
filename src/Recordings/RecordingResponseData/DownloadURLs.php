<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingResponseData;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Links to download the recording files.
 *
 * @phpstan-type download_urls = array{mp3?: string, wav?: string}
 */
final class DownloadURLs implements BaseModel
{
    /** @use SdkModel<download_urls> */
    use SdkModel;

    /**
     * Link to download the recording in mp3 format.
     */
    #[Api(optional: true)]
    public ?string $mp3;

    /**
     * Link to download the recording in wav format.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $mp3 && $obj->mp3 = $mp3;
        null !== $wav && $obj->wav = $wav;

        return $obj;
    }

    /**
     * Link to download the recording in mp3 format.
     */
    public function withMP3(string $mp3): self
    {
        $obj = clone $this;
        $obj->mp3 = $mp3;

        return $obj;
    }

    /**
     * Link to download the recording in wav format.
     */
    public function withWav(string $wav): self
    {
        $obj = clone $this;
        $obj->wav = $wav;

        return $obj;
    }
}
