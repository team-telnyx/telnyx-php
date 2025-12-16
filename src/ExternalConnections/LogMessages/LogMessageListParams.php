<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Page;

/**
 * Retrieve a list of log messages for all external connections associated with your account.
 *
 * @see Telnyx\Services\ExternalConnections\LogMessagesService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Page
 *
 * @phpstan-type LogMessageListParamsShape = array{
 *   filter?: FilterShape|null, page?: PageShape|null
 * }
 */
final class LogMessageListParams implements BaseModel
{
    /** @use SdkModel<LogMessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter parameter for log messages (deepObject style). Supports filtering by external_connection_id and telephone_number with eq/contains operations.
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Optional]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterShape $filter
     * @param PageShape $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Filter parameter for log messages (deepObject style). Supports filtering by external_connection_id and telephone_number with eq/contains operations.
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param PageShape $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
