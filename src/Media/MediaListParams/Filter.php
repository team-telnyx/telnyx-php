<?php

declare(strict_types=1);

namespace Telnyx\Media\MediaListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[content_type][].
 *
 * @phpstan-type FilterShape = array{content_type?: list<string>|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filters files by given content types.
     *
     * @var list<string>|null $content_type
     */
    #[Api(list: 'string', optional: true)]
    public ?array $content_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $content_type
     */
    public static function with(?array $content_type = null): self
    {
        $obj = new self;

        null !== $content_type && $obj->content_type = $content_type;

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
        $obj->content_type = $contentType;

        return $obj;
    }
}
