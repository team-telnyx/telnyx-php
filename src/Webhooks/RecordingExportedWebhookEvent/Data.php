<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\RecordingExportedWebhookEvent;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   bucket: string,
 *   bytes: int,
 *   key: string,
 *   region: string,
 *   sessionID: string,
 *   sha256: string,
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
    public int $bytes;

    #[Required]
    public string $key;

    #[Required]
    public string $region;

    #[Required('session_id')]
    public string $sessionID;

    #[Required]
    public string $sha256;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   bucket: ..., bytes: ..., key: ..., region: ..., sessionID: ..., sha256: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withBucket(...)
     *   ->withBytes(...)
     *   ->withKey(...)
     *   ->withRegion(...)
     *   ->withSessionID(...)
     *   ->withSha256(...)
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
    public static function with(
        string $bucket,
        int $bytes,
        string $key,
        string $region,
        string $sessionID,
        string $sha256,
    ): self {
        $self = new self;

        $self['bucket'] = $bucket;
        $self['bytes'] = $bytes;
        $self['key'] = $key;
        $self['region'] = $region;
        $self['sessionID'] = $sessionID;
        $self['sha256'] = $sha256;

        return $self;
    }

    public function withBucket(string $bucket): self
    {
        $self = clone $this;
        $self['bucket'] = $bucket;

        return $self;
    }

    public function withBytes(int $bytes): self
    {
        $self = clone $this;
        $self['bytes'] = $bytes;

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

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withSha256(string $sha256): self
    {
        $self = clone $this;
        $self['sha256'] = $sha256;

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
