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
        $obj = new self;

        null !== $contentType && $obj['contentType'] = $contentType;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $mediaName && $obj['mediaName'] = $mediaName;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Content type of the file.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj['contentType'] = $contentType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource will expire and be deleted.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * Uniquely identifies a media resource.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj['mediaName'] = $mediaName;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
