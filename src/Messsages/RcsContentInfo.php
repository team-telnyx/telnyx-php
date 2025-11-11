<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RcsContentInfoShape = array{
 *   file_url: string, force_refresh?: bool|null, thumbnail_url?: string|null
 * }
 */
final class RcsContentInfo implements BaseModel
{
    /** @use SdkModel<RcsContentInfoShape> */
    use SdkModel;

    /**
     * Publicly reachable URL of the file.
     */
    #[Api]
    public string $file_url;

    /**
     * If set the URL content will not be cached.
     */
    #[Api(optional: true)]
    public ?bool $force_refresh;

    /**
     * Publicly reachable URL of the thumbnail. Maximum size of 100 kB.
     */
    #[Api(optional: true)]
    public ?string $thumbnail_url;

    /**
     * `new RcsContentInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcsContentInfo::with(file_url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcsContentInfo)->withFileURL(...)
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
        string $file_url,
        ?bool $force_refresh = null,
        ?string $thumbnail_url = null
    ): self {
        $obj = new self;

        $obj->file_url = $file_url;

        null !== $force_refresh && $obj->force_refresh = $force_refresh;
        null !== $thumbnail_url && $obj->thumbnail_url = $thumbnail_url;

        return $obj;
    }

    /**
     * Publicly reachable URL of the file.
     */
    public function withFileURL(string $fileURL): self
    {
        $obj = clone $this;
        $obj->file_url = $fileURL;

        return $obj;
    }

    /**
     * If set the URL content will not be cached.
     */
    public function withForceRefresh(bool $forceRefresh): self
    {
        $obj = clone $this;
        $obj->force_refresh = $forceRefresh;

        return $obj;
    }

    /**
     * Publicly reachable URL of the thumbnail. Maximum size of 100 kB.
     */
    public function withThumbnailURL(string $thumbnailURL): self
    {
        $obj = clone $this;
        $obj->thumbnail_url = $thumbnailURL;

        return $obj;
    }
}
