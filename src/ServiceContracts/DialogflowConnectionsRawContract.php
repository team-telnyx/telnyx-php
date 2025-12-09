<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DialogflowConnections\DialogflowConnectionCreateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateParams;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface DialogflowConnectionsRawContract
{
    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param array<mixed>|DialogflowConnectionCreateParams $params
     *
     * @return BaseResponse<DialogflowConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        array|DialogflowConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     *
     * @return BaseResponse<DialogflowConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     * @param array<mixed>|DialogflowConnectionUpdateParams $params
     *
     * @return BaseResponse<DialogflowConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectionID,
        array|DialogflowConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $connectionID uniquely identifies a Telnyx application (Call Control)
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $connectionID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
