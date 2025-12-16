<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobileVoiceConnections\MobileVoiceConnection;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface MobileVoiceConnectionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MobileVoiceConnectionCreateParams $params
     *
     * @return BaseResponse<MobileVoiceConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MobileVoiceConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     *
     * @return BaseResponse<MobileVoiceConnectionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     * @param array<string,mixed>|MobileVoiceConnectionUpdateParams $params
     *
     * @return BaseResponse<MobileVoiceConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobileVoiceConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MobileVoiceConnectionListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<MobileVoiceConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|MobileVoiceConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     *
     * @return BaseResponse<MobileVoiceConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
