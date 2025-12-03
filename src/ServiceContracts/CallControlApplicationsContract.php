<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\CallControlApplications\CallControlApplication;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationListParams;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationUpdateParams;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;

interface CallControlApplicationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|CallControlApplicationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CallControlApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): CallControlApplicationGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallControlApplicationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CallControlApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): CallControlApplicationUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|CallControlApplicationListParams $params
     *
     * @return DefaultPagination<CallControlApplication>
     *
     * @throws APIException
     */
    public function list(
        array|CallControlApplicationListParams $params,
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
    ): CallControlApplicationDeleteResponse;
}
