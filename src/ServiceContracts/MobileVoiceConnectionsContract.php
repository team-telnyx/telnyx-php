<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionCreateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionDeleteResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionGetResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionListResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionNewResponse;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateParams;
use Telnyx\MobileVoiceConnections\MobileVoiceConnectionUpdateResponse;
use Telnyx\RequestOptions;

interface MobileVoiceConnectionsContract
{
    /**
     * @api
     *
     * @param array<mixed>|MobileVoiceConnectionCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MobileVoiceConnectionCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobileVoiceConnectionGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|MobileVoiceConnectionUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobileVoiceConnectionUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|MobileVoiceConnectionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MobileVoiceConnectionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MobileVoiceConnectionListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MobileVoiceConnectionDeleteResponse;
}
