<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfile;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileCreateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileDeleteResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileGetResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileListParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileNewResponse;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateParams;
use Telnyx\OutboundVoiceProfiles\OutboundVoiceProfileUpdateResponse;
use Telnyx\RequestOptions;

interface OutboundVoiceProfilesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|OutboundVoiceProfileCreateParams $params
     *
     * @return BaseResponse<OutboundVoiceProfileNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|OutboundVoiceProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<OutboundVoiceProfileGetResponse>
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
     * @param string $id identifies the resource
     * @param array<string,mixed>|OutboundVoiceProfileUpdateParams $params
     *
     * @return BaseResponse<OutboundVoiceProfileUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|OutboundVoiceProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|OutboundVoiceProfileListParams $params
     *
     * @return BaseResponse<DefaultPagination<OutboundVoiceProfile>>
     *
     * @throws APIException
     */
    public function list(
        array|OutboundVoiceProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<OutboundVoiceProfileDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
