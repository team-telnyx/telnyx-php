<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Recording\DownloadURLs;

/**
 * @phpstan-import-type DownloadURLsShape from \Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Recording\DownloadURLs
 *
 * @phpstan-type RecordingShape = array{
 *   id?: string|null,
 *   channels?: string|null,
 *   downloadURLs?: null|DownloadURLs|DownloadURLsShape,
 *   endTime?: \DateTimeInterface|null,
 *   format?: string|null,
 *   startTime?: \DateTimeInterface|null,
 * }
 */
final class Recording implements BaseModel
{
    /** @use SdkModel<RecordingShape> */
    use SdkModel;

    /**
     * Unique identifier of the recording.
     */
    #[Optional]
    public ?string $id;

    /**
     * The recording channel configuration.
     */
    #[Optional]
    public ?string $channels;

    /**
     * Download URL per format. URLs are pre-signed and expire.
     */
    #[Optional('download_urls')]
    public ?DownloadURLs $downloadURLs;

    /**
     * ISO 8601 datetime of when the recording ended.
     */
    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    /**
     * The recording file format.
     */
    #[Optional]
    public ?string $format;

    /**
     * ISO 8601 datetime of when the recording started.
     */
    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DownloadURLs|DownloadURLsShape|null $downloadURLs
     */
    public static function with(
        ?string $id = null,
        ?string $channels = null,
        DownloadURLs|array|null $downloadURLs = null,
        ?\DateTimeInterface $endTime = null,
        ?string $format = null,
        ?\DateTimeInterface $startTime = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $channels && $self['channels'] = $channels;
        null !== $downloadURLs && $self['downloadURLs'] = $downloadURLs;
        null !== $endTime && $self['endTime'] = $endTime;
        null !== $format && $self['format'] = $format;
        null !== $startTime && $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Unique identifier of the recording.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The recording channel configuration.
     */
    public function withChannels(string $channels): self
    {
        $self = clone $this;
        $self['channels'] = $channels;

        return $self;
    }

    /**
     * Download URL per format. URLs are pre-signed and expire.
     *
     * @param DownloadURLs|DownloadURLsShape $downloadURLs
     */
    public function withDownloadURLs(DownloadURLs|array $downloadURLs): self
    {
        $self = clone $this;
        $self['downloadURLs'] = $downloadURLs;

        return $self;
    }

    /**
     * ISO 8601 datetime of when the recording ended.
     */
    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $self = clone $this;
        $self['endTime'] = $endTime;

        return $self;
    }

    /**
     * The recording file format.
     */
    public function withFormat(string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    /**
     * ISO 8601 datetime of when the recording started.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }
}
