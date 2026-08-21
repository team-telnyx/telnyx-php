<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Filters;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InboxFiltersShape from \Telnyx\EmailInboxes\Filters\InboxFilters
 *
 * @phpstan-type FilterDeleteAllResponseShape = array{
 *   data: InboxFilters|InboxFiltersShape
 * }
 */
final class FilterDeleteAllResponse implements BaseModel
{
    /** @use SdkModel<FilterDeleteAllResponseShape> */
    use SdkModel;

    #[Required]
    public InboxFilters $data;

    /**
     * `new FilterDeleteAllResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilterDeleteAllResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilterDeleteAllResponse)->withData(...)
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
     *
     * @param InboxFilters|InboxFiltersShape $data
     */
    public static function with(InboxFilters|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param InboxFilters|InboxFiltersShape $data
     */
    public function withData(InboxFilters|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
