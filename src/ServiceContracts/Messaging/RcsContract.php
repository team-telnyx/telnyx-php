<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging\Rcs\RcGetCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcInviteTestNumberParams;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesParams;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcRetrieveCapabilitiesParams;
use Telnyx\RequestOptions;

interface RcsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RcInviteTestNumberParams $params
     *
     * @throws APIException
     */
    public function inviteTestNumber(
        string $phoneNumber,
        array|RcInviteTestNumberParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcInviteTestNumberResponse;

    /**
     * @api
     *
     * @param array<mixed>|RcListBulkCapabilitiesParams $params
     *
     * @throws APIException
     */
    public function listBulkCapabilities(
        array|RcListBulkCapabilitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcListBulkCapabilitiesResponse;

    /**
     * @api
     *
     * @param array<mixed>|RcRetrieveCapabilitiesParams $params
     *
     * @throws APIException
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        array|RcRetrieveCapabilitiesParams $params,
        ?RequestOptions $requestOptions = null,
    ): RcGetCapabilitiesResponse;
}
