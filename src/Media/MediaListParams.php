<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Media\MediaListParams\Filter;

/**
 * Returns a list of stored media files.
 *
 * @see Telnyx\Services\MediaService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Media\MediaListParams\Filter
 *
 * @phpstan-type MediaListParamsShape = array{filter?: null|Filter|FilterShape}
 */
final class MediaListParams implements BaseModel
{
    /** @use SdkModel<MediaListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[content_type][].
     */
    #[Optional]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filter|FilterShape|null $filter
     */
    public static function with(Filter|array|null $filter = null): self
    {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[content_type][].
     *
     * @param Filter|FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }
}
