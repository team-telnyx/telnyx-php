<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckCreateParams;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckDeleteResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckGetResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListParams;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckListResponse;
use Telnyx\GlobalIPHealthChecks\GlobalIPHealthCheckNewResponse;
use Telnyx\RequestOptions;

interface GlobalIPHealthChecksContract
{
    /**
     * @api
     *
     * @param array<mixed>|GlobalIPHealthCheckCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|GlobalIPHealthCheckCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPHealthCheckNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|GlobalIPHealthCheckListParams $params
     *
     * @return DefaultPagination<GlobalIPHealthCheckListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|GlobalIPHealthCheckListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): GlobalIPHealthCheckDeleteResponse;
}
