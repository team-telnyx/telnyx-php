<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingSaved\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Recording URLs in requested format. The URL is valid for as long as the file exists. For security purposes, this feature is activated on a per request basis.  Please contact customer support with your Account ID to request activation.
 *
 * @phpstan-type PublicRecordingURLsShape = array{
 *   mp3?: string|null, wav?: string|null
 * }
 */
final class PublicRecordingURLs implements BaseModel
{
    /** @use SdkModel<PublicRecordingURLsShape> */
    use SdkModel;

    /**
     * Recording URL in requested `mp3` format.
     */
    #[Optional(nullable: true)]
    public ?string $mp3;

    /**
     * Recording URL in requested `wav` format.
     */
    #[Optional(nullable: true)]
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
     * Recording URL in requested `mp3` format.
     */
    public function withMP3(?string $mp3): self
    {
        $self = clone $this;
        $self['mp3'] = $mp3;

        return $self;
    }

    /**
     * Recording URL in requested `wav` format.
     */
    public function withWav(?string $wav): self
    {
        $self = clone $this;
        $self['wav'] = $wav;

        return $self;
    }
}
