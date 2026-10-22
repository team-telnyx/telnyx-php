<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Recording;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Download URL per format. URLs are pre-signed and expire.
 *
 * @phpstan-type DownloadURLsShape = array{mp3?: string|null, wav?: string|null}
 */
final class DownloadURLs implements BaseModel
{
    /** @use SdkModel<DownloadURLsShape> */
    use SdkModel;

    /**
     * Pre-signed URL for the mp3 recording file.
     */
    #[Optional]
    public ?string $mp3;

    /**
     * Pre-signed URL for the wav recording file.
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
     * Pre-signed URL for the mp3 recording file.
     */
    public function withMP3(string $mp3): self
    {
        $self = clone $this;
        $self['mp3'] = $mp3;

        return $self;
    }

    /**
     * Pre-signed URL for the wav recording file.
     */
    public function withWav(string $wav): self
    {
        $self = clone $this;
        $self['wav'] = $wav;

        return $self;
    }
}
