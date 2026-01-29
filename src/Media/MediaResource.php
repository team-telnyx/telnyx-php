<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaResourceShape = array{
 *   contentType?: string|null,
 *   createdAt?: string|null,
 *   expiresAt?: string|null,
 *   mediaName?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class MediaResource implements BaseModel
{
    /** @use SdkModel<MediaResourceShape> */
    use SdkModel;

    /**
     * Content type of the file.
     */
    #[Optional('content_type')]
    public ?string $contentType;

    /**
     * ISO 8601 formatted date of when the media resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * ISO 8601 formatted date of when the media resource will expire and be deleted.
     */
    #[Optional('expires_at')]
    public ?string $expiresAt;

    /**
     * Uniquely identifies a media resource.
     */
    #[Optional('media_name')]
    public ?string $mediaName;

    /**
     * ISO 8601 formatted date of when the media resource was last updated.
     */
    #[Optional('updated_at')]
    public ?string $updatedAt;

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
        ?string $contentType = null,
        ?string $createdAt = null,
        ?string $expiresAt = null,
        ?string $mediaName = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $contentType && $self['contentType'] = $contentType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $mediaName && $self['mediaName'] = $mediaName;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Content type of the file.
     */
    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the media resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the media resource will expire and be deleted.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Uniquely identifies a media resource.
     */
    public function withMediaName(string $mediaName): self
    {
        $self = clone $this;
        $self['mediaName'] = $mediaName;

        return $self;
    }

    /**
     * ISO 8601 formatted date of when the media resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
