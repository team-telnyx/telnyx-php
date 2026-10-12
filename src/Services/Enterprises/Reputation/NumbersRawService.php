<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberDisassociateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetOwnershipResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberListParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberOwnershipConfirmParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRetrieveOwnershipParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberRetrieveParams;
use Telnyx\Enterprises\Reputation\Numbers\ReputationNumberSource;
use Telnyx\Enterprises\Reputation\Numbers\ReputationOwnershipStatus;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberList;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberWithReputation;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\NumbersRawContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumbersRawService implements NumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve one registered number with its latest reputation snapshot. The `phone_number` path parameter is in E.164 format and must be URL-encoded (e.g. `%2B19493253498`).
     *
     * @param string $phoneNumber Path param: Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param array{enterpriseID: string, fresh?: bool}|NumberRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationPhoneNumberWithReputation>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        array|NumberRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $enterpriseID = $parsed['enterpriseID'];
        unset($parsed['enterpriseID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'enterprises/%1$s/reputation/numbers/%2$s', $enterpriseID, $phoneNumber,
            ],
            query: $parsed,
            options: $options,
            convert: ReputationPhoneNumberWithReputation::class,
        );
    }

    /**
     * @api
     *
     * Paginated list of phone numbers registered for reputation monitoring under this enterprise. The response includes the latest reputation snapshot per number where one has been collected.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   filterOwnershipStatus?: ReputationOwnershipStatus|value-of<ReputationOwnershipStatus>,
     *   filterPhoneNumberContains?: string,
     *   filterPhoneNumberEq?: string,
     *   filterSource?: ReputationNumberSource|value-of<ReputationNumberSource>,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|NumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ReputationPhoneNumber>>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        array|NumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['enterprises/%1$s/reputation/numbers', $enterpriseID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterOwnershipStatus' => 'filter[ownership_status]',
                    'filterPhoneNumberContains' => 'filter[phone_number][contains]',
                    'filterPhoneNumberEq' => 'filter[phone_number][eq]',
                    'filterSource' => 'filter[source]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: ReputationPhoneNumber::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Add up to 100 phone numbers to reputation monitoring on this enterprise. Each must be in E.164 format (`+1NPANXXXXXX` for US/CA). A number in your Telnyx phone-number inventory is accepted as `source: telnyx`; a number that is not is treated as hosted with another provider and must meet the requirements below.
     *
     * **Prerequisite**: reputation must already be enabled on this enterprise (see `POST .../reputation`).
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * A phone number that is not in your Telnyx inventory is treated as a number hosted with another provider (`source: external`). It must be a US local number, and the enterprise's ownership proof must be approved first (`POST /enterprises/{enterprise_id}/reputation/external_verification`); otherwise the request fails with a 400 whose `detail` contains `external_verification_required`. Ownership of such numbers is checked every day.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{phoneNumbers: list<string>}|NumberAssociateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationPhoneNumberList>
     *
     * @throws APIException
     */
    public function associate(
        string $enterpriseID,
        array|NumberAssociateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberAssociateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/reputation/numbers', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: ReputationPhoneNumberList::class,
        );
    }

    /**
     * @api
     *
     * Stop tracking the reputation of this phone number. The number itself remains in your inventory; only the reputation registration is removed.
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param array{enterpriseID: string}|NumberDisassociateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function disassociate(
        string $phoneNumber,
        array|NumberDisassociateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberDisassociateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $enterpriseID = $parsed['enterpriseID'];
        unset($parsed['enterpriseID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'enterprises/%1$s/reputation/numbers/%2$s', $enterpriseID, $phoneNumber,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Answer an ownership question about a phone number hosted with another provider.
     *
     * Send `still_own: true` to confirm you still own a number whose `ownership_status` is `pending_confirmation` or `flagged`; its status returns to `verified` and, after a carrier change, the new carrier becomes the one on record.
     *
     * Send `still_own: false` to report that you no longer own the number. It is removed from Number Reputation immediately, whatever its current status, and the response shows it with `ownership_status: removed`.
     *
     * @param string $phoneNumber Path param: Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param array{
     *   enterpriseID: string, stillOwn: bool, evidenceDocumentID?: string
     * }|NumberOwnershipConfirmParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationPhoneNumberWithReputation>
     *
     * @throws APIException
     */
    public function ownershipConfirm(
        string $phoneNumber,
        array|NumberOwnershipConfirmParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberOwnershipConfirmParams::parseRequest(
            $params,
            $requestOptions,
        );
        $enterpriseID = $parsed['enterpriseID'];
        unset($parsed['enterpriseID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'enterprises/%1$s/reputation/numbers/%2$s/ownership_confirm',
                $enterpriseID,
                $phoneNumber,
            ],
            body: (object) array_diff_key($parsed, array_flip(['enterpriseID'])),
            options: $options,
            convert: ReputationPhoneNumberWithReputation::class,
        );
    }

    /**
     * @api
     *
     * Immediately refresh the stored reputation data for the listed numbers. This is in addition to the periodic refresh determined by `check_frequency`. Up to 100 numbers per call. The response carries the kicked-off jobs; the actual refresh runs asynchronously.
     *
     * **Pricing:** Forcing a refresh performs live reputation lookups, which are billable. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{phoneNumbers: list<string>}|NumberRefreshParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberRefreshResponse>
     *
     * @throws APIException
     */
    public function refresh(
        string $enterpriseID,
        array|NumberRefreshParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberRefreshParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/reputation/numbers/refresh', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: NumberRefreshResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the ownership status of a phone number, when it was last checked, the carrier recorded as its baseline, and the history of ownership events.
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param array{enterpriseID: string}|NumberRetrieveOwnershipParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberGetOwnershipResponse>
     *
     * @throws APIException
     */
    public function retrieveOwnership(
        string $phoneNumber,
        array|NumberRetrieveOwnershipParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberRetrieveOwnershipParams::parseRequest(
            $params,
            $requestOptions,
        );
        $enterpriseID = $parsed['enterpriseID'];
        unset($parsed['enterpriseID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'enterprises/%1$s/reputation/numbers/%2$s/ownership',
                $enterpriseID,
                $phoneNumber,
            ],
            options: $options,
            convert: NumberGetOwnershipResponse::class,
        );
    }
}
