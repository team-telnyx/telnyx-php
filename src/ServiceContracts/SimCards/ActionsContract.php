<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCards;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse;
use Telnyx\SimCards\Actions\ActionDisableResponse;
use Telnyx\SimCards\Actions\ActionEnableResponse;
use Telnyx\SimCards\Actions\ActionGetResponse;
use Telnyx\SimCards\Actions\ActionListParams\Filter\ActionType;
use Telnyx\SimCards\Actions\ActionListParams\Filter\Status;
use Telnyx\SimCards\Actions\ActionListResponse;
use Telnyx\SimCards\Actions\ActionRemovePublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetPublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetStandbyResponse;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;

interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param array{
     *   actionType?: 'enable'|'enable_standby_sim_card'|'disable'|'set_standby'|'remove_public_ip'|'set_public_ip'|ActionType,
     *   bulkSimCardActionID?: string,
     *   simCardID?: string,
     *   status?: 'in-progress'|'completed'|'failed'|Status,
     * } $filter Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): ActionListResponse;

    /**
     * @api
     *
     * @param list<string> $simCardIDs
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        array $simCardIDs,
        ?RequestOptions $requestOptions = null
    ): ActionBulkSetPublicIPsResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionEnableResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function removePublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePublicIPResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param string $regionCode The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        ?string $regionCode = null,
        ?RequestOptions $requestOptions = null,
    ): ActionSetPublicIPResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     *
     * @throws APIException
     */
    public function setStandby(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionSetStandbyResponse;

    /**
     * @api
     *
     * @param list<string> $registrationCodes
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        ?array $registrationCodes = null,
        ?RequestOptions $requestOptions = null
    ): ActionValidateRegistrationCodesResponse;
}
