<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\TexmlApplications\TexmlApplication;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

interface TexmlApplicationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|TexmlApplicationCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TexmlApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TexmlApplicationGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|TexmlApplicationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TexmlApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TexmlApplicationUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|TexmlApplicationListParams $params
     *
     * @return DefaultPagination<TexmlApplication>
     *
     * @throws APIException
     */
    public function list(
        array|TexmlApplicationListParams $params,
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
    ): TexmlApplicationDeleteResponse;
}
