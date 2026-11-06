<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionRecordingExport\Status;

/**
 * Customer Storage recording reference. Pending is not downloadable; exported means upload was verified; failed is terminal. Download with ordinary Storage authorization. No presigned URL is returned.
 *
 * @phpstan-type MeetingSessionRecordingExportShape = array{
 *   bucket: string,
 *   bytes: int|null,
 *   exportedAt: \DateTimeInterface|null,
 *   key: string,
 *   region: string,
 *   status: Status|value-of<Status>,
 *   type: 'video',
 * }
 */
final class MeetingSessionRecordingExport implements BaseModel
{
    /** @use SdkModel<MeetingSessionRecordingExportShape> */
    use SdkModel;

    /** @var 'video' $type */
    #[Required]
    public string $type = 'video';

    #[Required]
    public string $bucket;

    #[Required]
    public ?int $bytes;

    #[Required('exported_at')]
    public ?\DateTimeInterface $exportedAt;

    #[Required]
    public string $key;

    #[Required]
    public string $region;

    /** @var value-of<Status> $status */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * `new MeetingSessionRecordingExport()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionRecordingExport::with(
     *   bucket: ..., bytes: ..., exportedAt: ..., key: ..., region: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionRecordingExport)
     *   ->withBucket(...)
     *   ->withBytes(...)
     *   ->withExportedAt(...)
     *   ->withKey(...)
     *   ->withRegion(...)
     *   ->withStatus(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $bucket,
        ?int $bytes,
        ?\DateTimeInterface $exportedAt,
        string $key,
        string $region,
        Status|string $status,
    ): self {
        $self = new self;

        $self['bucket'] = $bucket;
        $self['bytes'] = $bytes;
        $self['exportedAt'] = $exportedAt;
        $self['key'] = $key;
        $self['region'] = $region;
        $self['status'] = $status;

        return $self;
    }

    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    public function withBytes(?int $bytes): self
    {
        $self = clone $this;
        $self['bytes'] = $bytes;

        return $self;
    }

    public function withExportedAt(?\DateTimeInterface $exportedAt): self
    {
        $self = clone $this;
        $self['exportedAt'] = $exportedAt;

        return $self;
    }

    public function withKey(string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param 'video' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
