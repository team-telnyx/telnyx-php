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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MobileVoiceConnectionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MobileVoiceConnectionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobileVoiceConnectionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MobileVoiceConnectionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobileVoiceConnectionGetResponse>
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
     * @param string $id The ID of the mobile voice connection
     * @param array<string,mixed>|MobileVoiceConnectionUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobileVoiceConnectionUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobileVoiceConnectionUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MobileVoiceConnectionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MobileVoiceConnection>>
     *
     * @throws APIException
     */
    public function list(
        array|MobileVoiceConnectionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile voice connection
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobileVoiceConnectionDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
