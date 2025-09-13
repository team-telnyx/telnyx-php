<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type media_resource = array{
 *   contentType?: string,
 *   createdAt?: string,
 *   expiresAt?: string,
 *   mediaName?: string,
 *   updatedAt?: string,
 * }
 */
final class MediaResource implements BaseModel
{
    /** @use SdkModel<media_resource> */
    use SdkModel;

    /**
     * Content type of the file.
     */
    #[Api('content_type', optional: true)]
    public ?string $contentType;

    /**
     * ISO 8601 formatted date of when the media resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * ISO 8601 formatted date of when the media resource will expire and be deleted.
     */
    #[Api('expires_at', optional: true)]
    public ?string $expiresAt;

    /**
     * Uniquely identifies a media resource.
     */
    #[Api('media_name', optional: true)]
    public ?string $mediaName;

    /**
     * ISO 8601 formatted date of when the media resource was last updated.
     */
    #[Api('updated_at', optional: true)]
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

        null !== $contentType && $obj->contentType = $contentType;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $mediaName && $obj->mediaName = $mediaName;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Content type of the file.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->contentType = $contentType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource will expire and be deleted.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * Uniquely identifies a media resource.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->mediaName = $mediaName;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
