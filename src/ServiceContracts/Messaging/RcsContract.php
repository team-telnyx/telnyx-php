<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Messaging\Rcs\RcGetCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesResponse;
use Telnyx\RequestOptions;

interface RcsContract
{
    /**
     * @api
     *
     * @param string $id
     *
     * @return RcInviteTestNumberResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function inviteTestNumber(
        string $phoneNumber,
        $id,
        ?RequestOptions $requestOptions = null
    ): RcInviteTestNumberResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RcInviteTestNumberResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function inviteTestNumberRaw(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): RcInviteTestNumberResponse;

    /**
     * @api
     *
     * @param string $agentID RCS Agent ID
     * @param list<string> $phoneNumbers List of phone numbers to check
     *
     * @return RcListBulkCapabilitiesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listBulkCapabilities(
        $agentID,
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): RcListBulkCapabilitiesResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RcListBulkCapabilitiesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listBulkCapabilitiesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): RcListBulkCapabilitiesResponse;

    /**
     * @api
     *
     * @param string $agentID
     *
     * @return RcGetCapabilitiesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        $agentID,
        ?RequestOptions $requestOptions = null
    ): RcGetCapabilitiesResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return RcGetCapabilitiesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveCapabilitiesRaw(
        string $phoneNumber,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): RcGetCapabilitiesResponse;
}
