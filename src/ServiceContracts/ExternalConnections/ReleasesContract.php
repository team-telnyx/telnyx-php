<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\ExternalConnections\Releases\ReleaseRetrieveParams;
use Telnyx\RequestOptions;

interface ReleasesContract
{
    /**
     * @api
     *
     * @param array<mixed>|ReleaseRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $releaseID,
        array|ReleaseRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ReleaseGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|ReleaseListParams $params
     *
     * @return DefaultPagination<ReleaseListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ReleaseListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
