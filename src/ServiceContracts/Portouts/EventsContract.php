<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams;
use Telnyx\Portouts\Events\EventListResponse;
use Telnyx\RequestOptions;

interface EventsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): EventGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventListParams $params
     *
     * @return DefaultPagination<EventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
