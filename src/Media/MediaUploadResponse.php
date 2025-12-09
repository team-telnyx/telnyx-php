<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaUploadResponseShape = array{data?: MediaResource|null}
 */
final class MediaUploadResponse implements BaseModel
{
    /** @use SdkModel<MediaUploadResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MediaResource $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MediaResource|array{
     *   contentType?: string|null,
     *   createdAt?: string|null,
     *   expiresAt?: string|null,
     *   mediaName?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(MediaResource|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MediaResource|array{
     *   contentType?: string|null,
     *   createdAt?: string|null,
     *   expiresAt?: string|null,
     *   mediaName?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(MediaResource|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
