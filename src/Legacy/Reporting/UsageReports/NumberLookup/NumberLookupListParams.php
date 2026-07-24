<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of telco data usage reports.
 *
 * @see Telnyx\Services\Legacy\Reporting\UsageReports\NumberLookupService::list()
 *
 * @phpstan-type NumberLookupListParamsShape = array{
 *   page?: int|null, perPage?: int|null
 * }
 */
final class NumberLookupListParams implements BaseModel
{
    /** @use SdkModel<NumberLookupListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number to retrieve (1-based).
     */
    #[Optional]
    public ?int $page;

    /**
     * Filter results by per page.
     */
    #[Optional]
    public ?int $perPage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $page = null, ?int $perPage = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $perPage && $self['perPage'] = $perPage;

        return $self;
    }

    /**
     * Page number to retrieve (1-based).
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * Filter results by per page.
     */
    public function withPerPage(int $perPage): self
    {
        $self = clone $this;
        $self['perPage'] = $perPage;

        return $self;
    }
}
