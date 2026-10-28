<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\BrowserSessions\BrowserSessionCreateParams;
use Telnyx\BrowserSessions\BrowserSessionDeleteResponse;
use Telnyx\BrowserSessions\BrowserSessionGetArtifactResponse;
use Telnyx\BrowserSessions\BrowserSessionGetResponse;
use Telnyx\BrowserSessions\BrowserSessionListParams;
use Telnyx\BrowserSessions\BrowserSessionListResponse;
use Telnyx\BrowserSessions\BrowserSessionNewResponse;
use Telnyx\BrowserSessions\BrowserSessionRetrieveArtifactParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrowserSessionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BrowserSessionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BrowserSessionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BrowserSessionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|BrowserSessionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BrowserSessionRetrieveArtifactParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BrowserSessionGetArtifactResponse>
     *
     * @throws APIException
     */
    public function retrieveArtifact(
        string $artifactID,
        array|BrowserSessionRetrieveArtifactParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
