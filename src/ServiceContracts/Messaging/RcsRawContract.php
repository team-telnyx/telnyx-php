<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging\Rcs\RcGetCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcInviteTestNumberParams;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesParams;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcRetrieveCapabilitiesParams;
use Telnyx\RequestOptions;

interface RcsRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E164 format to invite for testing
     * @param array<string,mixed>|RcInviteTestNumberParams $params
     *
     * @return BaseResponse<RcInviteTestNumberResponse>
     *
     * @throws APIException
     */
    public function inviteTestNumber(
        string $phoneNumber,
        array|RcInviteTestNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RcListBulkCapabilitiesParams $params
     *
     * @return BaseResponse<RcListBulkCapabilitiesResponse>
     *
     * @throws APIException
     */
    public function listBulkCapabilities(
        array|RcListBulkCapabilitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E164 format
     * @param array<string,mixed>|RcRetrieveCapabilitiesParams $params
     *
     * @return BaseResponse<RcGetCapabilitiesResponse>
     *
     * @throws APIException
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        array|RcRetrieveCapabilitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
