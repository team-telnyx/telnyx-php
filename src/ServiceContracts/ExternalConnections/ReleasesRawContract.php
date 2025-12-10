<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\ExternalConnections\Releases\ReleaseRetrieveParams;
use Telnyx\RequestOptions;

interface ReleasesRawContract
{
    /**
     * @api
     *
     * @param string $releaseID Identifies a Release request
     * @param array<mixed>|ReleaseRetrieveParams $params
     *
     * @return BaseResponse<ReleaseGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $releaseID,
        array|ReleaseRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<mixed>|ReleaseListParams $params
     *
     * @return BaseResponse<DefaultPagination<ReleaseListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ReleaseListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
