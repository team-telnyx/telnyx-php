<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallRecordingSavedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

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
    #[Api(nullable: true, optional: true)]
    public ?string $mp3;

    /**
     * Recording URL in requested `wav` format.
     */
    #[Api(nullable: true, optional: true)]
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

        null !== $mp3 && $obj['mp3'] = $mp3;
        null !== $wav && $obj['wav'] = $wav;

        return $obj;
    }

    /**
     * Recording URL in requested `mp3` format.
     */
    public function withMP3(?string $mp3): self
    {
        $obj = clone $this;
        $obj['mp3'] = $mp3;

        return $obj;
    }

    /**
     * Recording URL in requested `wav` format.
     */
    public function withWav(?string $wav): self
    {
        $obj = clone $this;
        $obj['wav'] = $wav;

        return $obj;
    }
}
