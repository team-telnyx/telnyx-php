<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberDisassociateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberListParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberListResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRetrieveParams;
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
     * @return BaseResponse<NumberGetResponse>
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
            convert: NumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Paginated list of phone numbers registered for reputation monitoring under this enterprise. The response includes the latest reputation snapshot per number where one has been collected.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   filterPhoneNumberContains?: string,
     *   filterPhoneNumberEq?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   phoneNumber?: string,
     * }|NumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NumberListResponse>>
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
                    'filterPhoneNumberContains' => 'filter[phone_number][contains]',
                    'filterPhoneNumberEq' => 'filter[phone_number][eq]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'phoneNumber' => 'phone_number',
                ],
            ),
            options: $options,
            convert: NumberListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Add up to 100 phone numbers to reputation monitoring on this enterprise. Each must be in E.164 format (`+1NPANXXXXXX` for US/CA) and belong to your Telnyx phone-number inventory.
     *
     * **Prerequisite**: reputation must already be enabled on this enterprise (see `POST .../reputation`).
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{phoneNumbers: list<string>}|NumberAssociateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberAssociateResponse>
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
            convert: NumberAssociateResponse::class,
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
}
