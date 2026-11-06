<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\RecordingExportFailedWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\RecordingExportFailedWebhookEvent\Data\Reason;

/**
 * @phpstan-type DataShape = array{
 *   bucket: string,
 *   key: string,
 *   reason: Reason|value-of<Reason>,
 *   region: string,
 *   sessionID: string,
 *   type: 'video',
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var 'video' $type */
    #[Required]
    public string $type = 'video';

    #[Required]
    public string $bucket;

    #[Required]
    public string $key;

    /** @var value-of<Reason> $reason */
    #[Required(enum: Reason::class)]
    public string $reason;

    #[Required]
    public string $region;

    #[Required('session_id')]
    public string $sessionID;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(bucket: ..., key: ..., reason: ..., region: ..., sessionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withBucket(...)
     *   ->withKey(...)
     *   ->withReason(...)
     *   ->withRegion(...)
     *   ->withSessionID(...)
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
     * @param Reason|value-of<Reason> $reason
     */
    public static function with(
        string $bucket,
        string $key,
        Reason|string $reason,
        string $region,
        string $sessionID,
    ): self {
        $self = new self;

        $self['bucket'] = $bucket;
        $self['key'] = $key;
        $self['reason'] = $reason;
        $self['region'] = $region;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    public function withKey(string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    /**
     * @param Reason|value-of<Reason> $reason
     */
    public function withReason(Reason|string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

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
