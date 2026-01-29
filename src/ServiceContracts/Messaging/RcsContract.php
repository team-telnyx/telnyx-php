<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging\Rcs\RcGetCapabilitiesResponse;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;
use Telnyx\Messaging\Rcs\RcListBulkCapabilitiesResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RcsContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E164 format to invite for testing
     * @param string $id RCS agent ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function inviteTestNumber(
        string $phoneNumber,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): RcInviteTestNumberResponse;

    /**
     * @api
     *
     * @param string $agentID RCS Agent ID
     * @param list<string> $phoneNumbers List of phone numbers to check
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listBulkCapabilities(
        string $agentID,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): RcListBulkCapabilitiesResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E164 format
     * @param string $agentID RCS agent ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveCapabilities(
        string $phoneNumber,
        string $agentID,
        RequestOptions|array|null $requestOptions = null,
    ): RcGetCapabilitiesResponse;
}
