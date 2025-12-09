<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Integrations;

use Telnyx\AI\Integrations\Connections\ConnectionGetResponse;
use Telnyx\AI\Integrations\Connections\ConnectionListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ConnectionsRawContract
{
    /**
     * @api
     *
     * @param string $userConnectionID The connection id
     *
     * @return BaseResponse<ConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $userConnectionID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<ConnectionListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;

    /**
     * @api
     *
     * @param string $userConnectionID The user integration connection identifier
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $userConnectionID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
