<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Portouts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Portouts\Events\EventGetResponse;
use Telnyx\Portouts\Events\EventListParams;
use Telnyx\Portouts\Events\EventListResponse;
use Telnyx\RequestOptions;

interface EventsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the port-out event
     *
     * @return BaseResponse<EventGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventListParams $params
     *
     * @return BaseResponse<DefaultPagination<EventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the port-out event
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
