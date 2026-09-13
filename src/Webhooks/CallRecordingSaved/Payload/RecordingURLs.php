<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingSaved\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Recording URLs in requested format. These URLs are valid for 10 minutes. After 10 minutes, you may retrieve recordings via API using Reports -> Call Recordings documentation, or via Mission Control under Reporting -> Recordings.
 *
 * @phpstan-type RecordingURLsShape = array{mp3?: string|null, wav?: string|null}
 */
final class RecordingURLs implements BaseModel
{
    /** @use SdkModel<RecordingURLsShape> */
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
