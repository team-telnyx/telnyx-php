<?php

declare(strict_types=1);

namespace Telnyx\Media\MediaListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[content_type][].
 *
 * @phpstan-type FilterShape = array{contentType?: list<string>}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filters files by given content types.
     *
     * @var list<string>|null $contentType
     */
    #[Api('content_type', list: 'string', optional: true)]
    public ?array $contentType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $contentType
     */
    public static function with(?array $contentType = null): self
    {
        $obj = new self;

        null !== $contentType && $obj->contentType = $contentType;

        return $obj;
    }

    /**
     * Filters files by given content types.
     *
     * @param list<string> $contentType
     */
    public function withContentType(array $contentType): self
    {
        $obj = clone $this;
        $obj->contentType = $contentType;

        return $obj;
    }
}
