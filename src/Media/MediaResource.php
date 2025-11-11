<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaResourceShape = array{
 *   content_type?: string|null,
 *   created_at?: string|null,
 *   expires_at?: string|null,
 *   media_name?: string|null,
 *   updated_at?: string|null,
 * }
 */
final class MediaResource implements BaseModel
{
    /** @use SdkModel<MediaResourceShape> */
    use SdkModel;

    /**
     * Content type of the file.
     */
    #[Api(optional: true)]
    public ?string $content_type;

    /**
     * ISO 8601 formatted date of when the media resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * ISO 8601 formatted date of when the media resource will expire and be deleted.
     */
    #[Api(optional: true)]
    public ?string $expires_at;

    /**
     * Uniquely identifies a media resource.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * ISO 8601 formatted date of when the media resource was last updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
        ?string $content_type = null,
        ?string $created_at = null,
        ?string $expires_at = null,
        ?string $media_name = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $content_type && $obj->content_type = $content_type;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $expires_at && $obj->expires_at = $expires_at;
        null !== $media_name && $obj->media_name = $media_name;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Content type of the file.
     */
    public function withContentType(string $contentType): self
    {
        $obj = clone $this;
        $obj->content_type = $contentType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource will expire and be deleted.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj->expires_at = $expiresAt;

        return $obj;
    }

    /**
     * Uniquely identifies a media resource.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->media_name = $mediaName;

        return $obj;
    }

    /**
     * ISO 8601 formatted date of when the media resource was last updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
