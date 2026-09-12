<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ConferenceRecordingSaved\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

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
    public static function with(
        string|Omitted|null $mp3 = Omitted::VALUE,
        string|Omitted|null $wav = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $mp3 && $self['mp3'] = $mp3;
        Omitted::VALUE !== $wav && $self['wav'] = $wav;

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
