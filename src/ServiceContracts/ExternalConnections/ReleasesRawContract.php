<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse;
use Telnyx\ExternalConnections\Releases\ReleaseListParams;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse;
use Telnyx\ExternalConnections\Releases\ReleaseRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReleasesRawContract
{
    /**
     * @api
     *
     * @param string $releaseID Identifies a Release request
     * @param array<string,mixed>|ReleaseRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReleaseGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $releaseID,
        array|ReleaseRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<string,mixed>|ReleaseListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ReleaseListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|ReleaseListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
