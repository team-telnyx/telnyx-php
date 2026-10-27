<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\BrowserSessionGetArtifactResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id: string,
 *   actionID: string,
 *   checksum: string,
 *   contentType: string,
 *   createdAt: \DateTimeInterface,
 *   downloadURL: string,
 *   expiresAt: \DateTimeInterface,
 *   sessionID: string,
 *   sizeBytes: int,
 *   type: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required('action_id')]
    public string $actionID;

    #[Required]
    public string $checksum;

    #[Required('content_type')]
    public string $contentType;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Signed relative path (starts with /v2/artifact_downloads/). Prepend your API host, e.g. https://api.telnyx.com, before calling it.
     */
    #[Required('download_url')]
    public string $downloadURL;

    #[Required('expires_at')]
    public \DateTimeInterface $expiresAt;

    #[Required('session_id')]
    public string $sessionID;

    #[Required('size_bytes')]
    public int $sizeBytes;

    #[Required]
    public string $type;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   actionID: ...,
     *   checksum: ...,
     *   contentType: ...,
     *   createdAt: ...,
     *   downloadURL: ...,
     *   expiresAt: ...,
     *   sessionID: ...,
     *   sizeBytes: ...,
     *   type: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withActionID(...)
     *   ->withChecksum(...)
     *   ->withContentType(...)
     *   ->withCreatedAt(...)
     *   ->withDownloadURL(...)
     *   ->withExpiresAt(...)
     *   ->withSessionID(...)
     *   ->withSizeBytes(...)
     *   ->withType(...)
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
        string $id,
        string $actionID,
        string $checksum,
        string $contentType,
        \DateTimeInterface $createdAt,
        string $downloadURL,
        \DateTimeInterface $expiresAt,
        string $sessionID,
        int $sizeBytes,
        string $type,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['actionID'] = $actionID;
        $self['checksum'] = $checksum;
        $self['contentType'] = $contentType;
        $self['createdAt'] = $createdAt;
        $self['downloadURL'] = $downloadURL;
        $self['expiresAt'] = $expiresAt;
        $self['sessionID'] = $sessionID;
        $self['sizeBytes'] = $sizeBytes;
        $self['type'] = $type;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withActionID(string $actionID): self
    {
        $self = clone $this;
        $self['actionID'] = $actionID;

        return $self;
    }

    public function withChecksum(string $checksum): self
    {
        $self = clone $this;
        $self['checksum'] = $checksum;

        return $self;
    }

    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Signed relative path (starts with /v2/artifact_downloads/). Prepend your API host, e.g. https://api.telnyx.com, before calling it.
     */
    public function withDownloadURL(string $downloadURL): self
    {
        $self = clone $this;
        $self['downloadURL'] = $downloadURL;

        return $self;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withSessionID(string $sessionID): self
    {
        $self = clone $this;
        $self['sessionID'] = $sessionID;

        return $self;
    }

    public function withSizeBytes(int $sizeBytes): self
    {
        $self = clone $this;
        $self['sizeBytes'] = $sizeBytes;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
