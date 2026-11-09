<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Customer-owned Telnyx Storage destination for recording exports. Uses the authenticated organization and user; do not supply credentials, region, organization ID or object key.
 *
 * @phpstan-type MeetingSessionRecordingDestinationShape = array{
 *   bucket: string, prefix?: string|null
 * }
 */
final class MeetingSessionRecordingDestination implements BaseModel
{
    /** @use SdkModel<MeetingSessionRecordingDestinationShape> */
    use SdkModel;

    /**
     * Existing accessible bucket. Consecutive dots and IPv4-address names are rejected.
     */
    #[Required]
    public string $bucket;

    /**
     * Optional object-key prefix. One trailing slash is normalized. Empty path segments, . and .. segments are rejected.
     */
    #[Optional]
    public ?string $prefix;

    /**
     * `new MeetingSessionRecordingDestination()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MeetingSessionRecordingDestination::with(bucket: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MeetingSessionRecordingDestination)->withBucket(...)
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
     */
    public static function with(string $bucket, ?string $prefix = null): self
    {
        $self = new self;

        $self['bucket'] = $bucket;

        null !== $prefix && $self['prefix'] = $prefix;

        return $self;
    }

    /**
     * Existing accessible bucket. Consecutive dots and IPv4-address names are rejected.
     */
    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    /**
     * Optional object-key prefix. One trailing slash is normalized. Empty path segments, . and .. segments are rejected.
     */
    public function withPrefix(string $prefix): self
    {
        $self = clone $this;
        $self['prefix'] = $prefix;

        return $self;
    }
}
