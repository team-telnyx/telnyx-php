<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RcsContentInfoShape = array{
 *   fileURL: string, forceRefresh?: bool|null, thumbnailURL?: string|null
 * }
 */
final class RcsContentInfo implements BaseModel
{
    /** @use SdkModel<RcsContentInfoShape> */
    use SdkModel;

    /**
     * Publicly reachable URL of the file.
     */
    #[Required('file_url')]
    public string $fileURL;

    /**
     * If set the URL content will not be cached.
     */
    #[Optional('force_refresh')]
    public ?bool $forceRefresh;

    /**
     * Publicly reachable URL of the thumbnail. Maximum size of 100 kB.
     */
    #[Optional('thumbnail_url')]
    public ?string $thumbnailURL;

    /**
     * `new RcsContentInfo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcsContentInfo::with(fileURL: ...)
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
        string $fileURL,
        ?bool $forceRefresh = null,
        ?string $thumbnailURL = null
    ): self {
        $obj = new self;

        $obj['fileURL'] = $fileURL;

        null !== $forceRefresh && $obj['forceRefresh'] = $forceRefresh;
        null !== $thumbnailURL && $obj['thumbnailURL'] = $thumbnailURL;

        return $obj;
    }

    /**
     * Publicly reachable URL of the file.
     */
    public function withFileURL(string $fileURL): self
    {
        $obj = clone $this;
        $obj['fileURL'] = $fileURL;

        return $obj;
    }

    /**
     * If set the URL content will not be cached.
     */
    public function withForceRefresh(bool $forceRefresh): self
    {
        $obj = clone $this;
        $obj['forceRefresh'] = $forceRefresh;

        return $obj;
    }

    /**
     * Publicly reachable URL of the thumbnail. Maximum size of 100 kB.
     */
    public function withThumbnailURL(string $thumbnailURL): self
    {
        $obj = clone $this;
        $obj['thumbnailURL'] = $thumbnailURL;

        return $obj;
    }
}
