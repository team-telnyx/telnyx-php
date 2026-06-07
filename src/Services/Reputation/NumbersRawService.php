<?php

declare(strict_types=1);

namespace Telnyx\Services\Reputation;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reputation\Numbers\NumberGetResponse;
use Telnyx\Reputation\Numbers\NumberListParams;
use Telnyx\Reputation\Numbers\NumberListResponse;
use Telnyx\Reputation\Numbers\NumberRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reputation\NumbersRawContract;

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
     * Convenience alias for `GET /v2/enterprises/{enterprise_id}/reputation/numbers/{phone_number}`.
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param array{fresh?: bool}|NumberRetrieveParams $params
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['reputation/numbers/%1$s', $phoneNumber],
            query: $parsed,
            options: $options,
            convert: NumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Convenience alias for `GET /v2/enterprises/{enterprise_id}/reputation/numbers` that returns numbers across every enterprise you own. Useful when you don't want to look up the enterprise id first.
     *
     * @param array{
     *   filterEnterpriseID?: string,
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
            path: 'reputation/numbers',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterEnterpriseID' => 'filter[enterprise_id]',
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
     * Convenience alias for `DELETE /v2/enterprises/{enterprise_id}/reputation/numbers/{phone_number}`.
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['reputation/numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: null,
        );
    }
}
