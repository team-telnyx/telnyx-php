<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCards;

use Telnyx\RequestOptions;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse;
use Telnyx\SimCards\Actions\ActionDisableResponse;
use Telnyx\SimCards\Actions\ActionEnableResponse;
use Telnyx\SimCards\Actions\ActionGetResponse;
use Telnyx\SimCards\Actions\ActionListParams\Filter;
use Telnyx\SimCards\Actions\ActionListParams\Page;
use Telnyx\SimCards\Actions\ActionListResponse;
use Telnyx\SimCards\Actions\ActionRemovePublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetPublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetStandbyResponse;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;

use const Telnyx\Core\OMIT as omit;

interface ActionsContract
{
    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ActionListResponse;

    /**
     * @api
     *
     * @param list<string> $simCardIDs
     */
    public function bulkSetPublicIPs(
        $simCardIDs,
        ?RequestOptions $requestOptions = null
    ): ActionBulkSetPublicIPsResponse;

    /**
     * @api
     */
    public function disable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse;

    /**
     * @api
     */
    public function enable(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionEnableResponse;

    /**
     * @api
     */
    public function removePublicIP(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePublicIPResponse;

    /**
     * @api
     *
     * @param string $regionCode The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint
     */
    public function setPublicIP(
        string $id,
        $regionCode = omit,
        ?RequestOptions $requestOptions = null
    ): ActionSetPublicIPResponse;

    /**
     * @api
     */
    public function setStandby(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ActionSetStandbyResponse;

    /**
     * @api
     *
     * @param list<string> $registrationCodes
     */
    public function validateRegistrationCodes(
        $registrationCodes = omit,
        ?RequestOptions $requestOptions = null
    ): ActionValidateRegistrationCodesResponse;
}
