<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberDisassociateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberListParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRetrieveParams;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberList;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberWithReputation;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Path param: Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param array<string,mixed>|NumberRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|NumberListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|NumberAssociateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param array<string,mixed>|NumberDisassociateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array<string,mixed>|NumberRefreshParams $params
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
    ): BaseResponse;
}
