<?php

declare(strict_types=1);

namespace Telnyx\Media;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Media\MediaListParams\Filter;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new MediaListParams); // set properties as needed
 * $client->media->list(...$params->toArray());
 * ```
 * Returns a list of stored media files.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->media->list(...$params->toArray());`
 *
 * @see Telnyx\Media->list
 *
 * @phpstan-type media_list_params = array{filter?: Filter}
 */
final class MediaListParams implements BaseModel
{
    /** @use SdkModel<media_list_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[content_type][].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[content_type][].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }
}
