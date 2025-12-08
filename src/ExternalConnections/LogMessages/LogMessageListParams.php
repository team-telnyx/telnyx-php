<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter\TelephoneNumber;
use Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Page;

/**
 * Retrieve a list of log messages for all external connections associated with your account.
 *
 * @see Telnyx\Services\ExternalConnections\LogMessagesService::list()
 *
 * @phpstan-type LogMessageListParamsShape = array{
 *   filter?: Filter|array{
 *     external_connection_id?: string|null,
 *     telephone_number?: TelephoneNumber|null,
 *   },
 *   page?: Page|array{number?: int|null, size?: int|null},
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
     * @param Filter|array{
     *   external_connection_id?: string|null, telephone_number?: TelephoneNumber|null
     * } $filter
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public static function with(
        Filter|array|null $filter = null,
        Page|array|null $page = null
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;

        return $obj;
    }

    /**
     * Filter parameter for log messages (deepObject style). Supports filtering by external_connection_id and telephone_number with eq/contains operations.
     *
     * @param Filter|array{
     *   external_connection_id?: string|null, telephone_number?: TelephoneNumber|null
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     *
     * @param Page|array{number?: int|null, size?: int|null} $page
     */
    public function withPage(Page|array $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }
}
