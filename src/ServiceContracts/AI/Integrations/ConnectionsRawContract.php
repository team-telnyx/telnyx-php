<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Integrations;

use Telnyx\AI\Integrations\Connections\ConnectionGetResponse;
use Telnyx\AI\Integrations\Connections\ConnectionListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ConnectionsRawContract
{
    /**
     * @api
     *
     * @param string $userConnectionID The connection id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ConnectionListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $userConnectionID The user integration connection identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $userConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
