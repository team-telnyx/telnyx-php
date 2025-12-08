<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaGetResponseShape = array{data?: MediaResource|null}
 */
final class MediaGetResponse implements BaseModel
{
    /** @use SdkModel<MediaGetResponseShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     *   content_type?: string|null,
     *   created_at?: string|null,
     *   expires_at?: string|null,
     *   media_name?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(MediaResource|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param MediaResource|array{
     *   content_type?: string|null,
     *   created_at?: string|null,
     *   expires_at?: string|null,
     *   media_name?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(MediaResource|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
