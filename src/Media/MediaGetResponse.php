<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MediaResourceShape from \Telnyx\Media\MediaResource
 *
 * @phpstan-type MediaGetResponseShape = array{
 *   data?: null|MediaResource|MediaResourceShape
 * }
 */
final class MediaGetResponse implements BaseModel
{
    /** @use SdkModel<MediaGetResponseShape> */
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
     * @param MediaResourceShape $data
     */
    public static function with(MediaResource|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MediaResourceShape $data
     */
    public function withData(MediaResource|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
