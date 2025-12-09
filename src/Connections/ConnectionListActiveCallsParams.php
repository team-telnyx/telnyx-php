<?php

declare(strict_types=1);

namespace Telnyx\Connections;

use Telnyx\Connections\ConnectionListActiveCallsParams\Page;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists all active calls for given connection. Acceptable connections are either SIP connections with webhook_url or xml_request_url, call control or texml. Returned results are cursor paginated.
 *
 * @see Telnyx\Services\ConnectionsService::listActiveCalls()
 *
 * @phpstan-type ConnectionListActiveCallsParamsShape = array{
 *   page?: Page|array{
 *     after?: string|null,
 *     before?: string|null,
 *     limit?: int|null,
 *     number?: int|null,
 *     size?: int|null,
 *   },
 * }
 */
final class ConnectionListActiveCallsParams implements BaseModel
{
    /** @use SdkModel<ConnectionListActiveCallsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
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
     * @param Page|array{
     *   after?: string|null,
     *   before?: string|null,
     *   limit?: int|null,
     *   number?: int|null,
     *   size?: int|null,
     * } $page
     */
    public static function with(Page|array|null $page = null): self
    {
        $self = new self;

        null !== $page && $self['page'] = $page;

        return $self;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number].
     *
     * @param Page|array{
     *   after?: string|null,
     *   before?: string|null,
     *   limit?: int|null,
     *   number?: int|null,
     *   size?: int|null,
     * } $page
     */
    public function withPage(Page|array $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }
}
