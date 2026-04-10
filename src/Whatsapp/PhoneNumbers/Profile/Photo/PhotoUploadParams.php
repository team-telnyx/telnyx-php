<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\Profile\Photo;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\FileParam;

/**
 * Upload Whatsapp profile photo.
 *
 * @see Telnyx\Services\Whatsapp\PhoneNumbers\Profile\PhotoService::upload()
 *
 * @phpstan-type PhotoUploadParamsShape = array{file: string|FileParam}
 */
final class PhotoUploadParams implements BaseModel
{
    /** @use SdkModel<PhotoUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Image file (JPEG recommended, max 10 MB).
     */
    #[Required]
    public string $file;

    /**
     * `new PhotoUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhotoUploadParams::with(file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhotoUploadParams)->withFile(...)
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
    public static function with(string|FileParam $file): self
    {
        $self = new self;

        $self['file'] = $file;

        return $self;
    }

    /**
     * Image file (JPEG recommended, max 10 MB).
     */
    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }
}
