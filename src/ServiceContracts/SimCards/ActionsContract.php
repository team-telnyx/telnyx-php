<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCards;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse;
use Telnyx\SimCards\Actions\ActionDisableResponse;
use Telnyx\SimCards\Actions\ActionEnableResponse;
use Telnyx\SimCards\Actions\ActionGetResponse;
use Telnyx\SimCards\Actions\ActionListParams\Filter;
use Telnyx\SimCards\Actions\ActionListParams\Page;
use Telnyx\SimCards\Actions\ActionRemovePublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetPublicIPResponse;
use Telnyx\SimCards\Actions\ActionSetStandbyResponse;
use Telnyx\SimCards\Actions\ActionValidateRegistrationCodesResponse;
use Telnyx\SimCards\Actions\SimCardAction;

/**
 * @phpstan-import-type FilterShape from \Telnyx\SimCards\Actions\ActionListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\SimCards\Actions\ActionListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type]
     * @param Page|PageShape $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<SimCardAction>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param list<string> $simCardIDs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        array $simCardIDs,
        RequestOptions|array|null $requestOptions = null
    ): ActionBulkSetPublicIPsResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionDisableResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enable(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionEnableResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function removePublicIP(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionRemovePublicIPResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param string $regionCode The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        ?string $regionCode = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionSetPublicIPResponse;

    /**
     * @api
     *
     * @param string $id identifies the SIM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setStandby(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ActionSetStandbyResponse;

    /**
     * @api
     *
     * @param list<string> $registrationCodes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        ?array $registrationCodes = null,
        RequestOptions|array|null $requestOptions = null,
    ): ActionValidateRegistrationCodesResponse;
}
