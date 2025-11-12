<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Page;

/**
 * This endpoint returns a list of your External Connections inside the 'data' attribute of the response. External Connections are used by Telnyx customers to seamless configure SIP trunking integrations with Telnyx Partners, through External Voice Integrations in Mission Control Portal.
 *
 * @see Telnyx\ExternalConnectionsService::list()
 *
 * @phpstan-type ExternalConnectionListParamsShape = array{
 *   filter?: Filter, page?: Page
 * }
 */
final class ExternalConnectionListParams implements BaseModel
{
    /** @use SdkModel<ExternalConnectionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    #[Api(optional: true)]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Filter $filter = null, ?Page $page = null): self
    {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[size], page[number].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
