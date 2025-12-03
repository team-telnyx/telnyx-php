<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Telnyx\RequestOptions;

interface OutboundVoiceProfilesContract
{
    /**
     * @api
     *
     * @param array<mixed>|OutboundVoiceProfileCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|OutboundVoiceProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|OutboundVoiceProfileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|OutboundVoiceProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|OutboundVoiceProfileListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|OutboundVoiceProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): OutboundVoiceProfileListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OutboundVoiceProfileDeleteResponse;
}
