<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Filters;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\EmailInboxes\Filters\FilterDeleteAllResponse\Data
 *
 * @phpstan-type FilterDeleteAllResponseShape = array{data: Data|DataShape}
 */
final class FilterDeleteAllResponse implements BaseModel
{
    /** @use SdkModel<FilterDeleteAllResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
