<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging;

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
     */
    public function inviteTestNumber(
        string $phoneNumber,
        $id,
        ?RequestOptions $requestOptions = null
    ): RcInviteTestNumberResponse;

    /**
     * @api
     *
     * @param string $agentID RCS Agent ID
     * @param list<string> $phoneNumbers List of phone numbers to check
     *
     * @return RcListBulkCapabilitiesResponse<HasRawResponse>
     */
    public function listBulkCapabilities(
        $agentID,
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): RcListBulkCapabilitiesResponse;

    /**
     * @api
     *
     * @param string $agentID
     *
     * @return RcGetCapabilitiesResponse<HasRawResponse>
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        $agentID,
        ?RequestOptions $requestOptions = null
    ): RcGetCapabilitiesResponse;
}
