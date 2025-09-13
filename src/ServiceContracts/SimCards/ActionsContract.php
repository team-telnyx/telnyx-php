<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SimCards;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
     *
     * @return ActionGetResponse<HasRawResponse>
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
     * @return ActionGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionGetResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for SIM card actions (deepObject style). Originally: filter[sim_card_id], filter[status], filter[bulk_sim_card_action_id], filter[action_type]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return ActionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ActionListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionListResponse;

    /**
     * @api
     *
     * @param list<string> $simCardIDs
     *
     * @return ActionBulkSetPublicIPsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function bulkSetPublicIPs(
        $simCardIDs,
        ?RequestOptions $requestOptions = null
    ): ActionBulkSetPublicIPsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionBulkSetPublicIPsResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function bulkSetPublicIPsRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionBulkSetPublicIPsResponse;

    /**
     * @api
     *
     * @return ActionDisableResponse<HasRawResponse>
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
     * @return ActionDisableResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function disableRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionDisableResponse;

    /**
     * @api
     *
     * @return ActionEnableResponse<HasRawResponse>
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
     * @return ActionEnableResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function enableRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionEnableResponse;

    /**
     * @api
     *
     * @return ActionRemovePublicIPResponse<HasRawResponse>
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
     * @return ActionRemovePublicIPResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function removePublicIPRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionRemovePublicIPResponse;

    /**
     * @api
     *
     * @param string $regionCode The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint
     *
     * @return ActionSetPublicIPResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function setPublicIP(
        string $id,
        $regionCode = omit,
        ?RequestOptions $requestOptions = null
    ): ActionSetPublicIPResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionSetPublicIPResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function setPublicIPRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionSetPublicIPResponse;

    /**
     * @api
     *
     * @return ActionSetStandbyResponse<HasRawResponse>
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
     * @return ActionSetStandbyResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function setStandbyRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): ActionSetStandbyResponse;

    /**
     * @api
     *
     * @param list<string> $registrationCodes
     *
     * @return ActionValidateRegistrationCodesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function validateRegistrationCodes(
        $registrationCodes = omit,
        ?RequestOptions $requestOptions = null
    ): ActionValidateRegistrationCodesResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ActionValidateRegistrationCodesResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function validateRegistrationCodesRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ActionValidateRegistrationCodesResponse;
}
