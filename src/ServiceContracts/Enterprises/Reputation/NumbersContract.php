<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberListResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumbersContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Path param: Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param string $enterpriseID Path param: The enterprise id. Lowercase UUID.
     * @param bool $fresh Query param: When true, fetches fresh reputation data (incurs API cost). When false (default), returns cached data.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        string $enterpriseID,
        bool $fresh = false,
        RequestOptions|array|null $requestOptions = null,
    ): NumberGetResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $filterPhoneNumberContains Partial match on phone number. Must contain at least 5 digits.
     * @param string $filterPhoneNumberEq Exact phone-number match (E.164).
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Default 10. Maximum 250; values above are clamped to 250.
     * @param string $phoneNumber Filter by specific phone number (E.164 format).
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        ?string $filterPhoneNumberContains = null,
        ?string $filterPhoneNumberEq = null,
        int $pageNumber = 1,
        int $pageSize = 10,
        ?string $phoneNumber = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param list<string> $phoneNumbers 1–100 phone numbers in E.164 format with a leading `+`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function associate(
        string $enterpriseID,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): NumberAssociateResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disassociate(
        string $phoneNumber,
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param list<string> $phoneNumbers Phone numbers to refresh reputation data for. 1–100 numbers per request, each in E.164 format. Reputation refreshes are subject to per-enterprise rate limits.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function refresh(
        string $enterpriseID,
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null,
    ): NumberRefreshResponse;
}
