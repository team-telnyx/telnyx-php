<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetOwnershipResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse;
use Telnyx\Enterprises\Reputation\Numbers\ReputationNumberSource;
use Telnyx\Enterprises\Reputation\Numbers\ReputationOwnershipStatus;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberList;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberWithReputation;
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
    ): ReputationPhoneNumberWithReputation;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param ReputationOwnershipStatus|value-of<ReputationOwnershipStatus> $filterOwnershipStatus Only numbers with this ownership status. `removed` lists the numbers that were removed, each with its `removal_reason` and `removed_at`; removed numbers are not returned otherwise.
     * @param string $filterPhoneNumberContains Partial match on phone number. Must contain at least 5 digits.
     * @param string $filterPhoneNumberEq Exact phone-number match (E.164).
     * @param ReputationNumberSource|value-of<ReputationNumberSource> $filterSource only numbers with this source
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Default 10. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ReputationPhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        ReputationOwnershipStatus|string|null $filterOwnershipStatus = null,
        ?string $filterPhoneNumberContains = null,
        ?string $filterPhoneNumberEq = null,
        ReputationNumberSource|string|null $filterSource = null,
        int $pageNumber = 1,
        int $pageSize = 10,
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
    ): ReputationPhoneNumberList;

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
     * @param string $phoneNumber Path param: Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param string $enterpriseID Path param: The enterprise id. Lowercase UUID.
     * @param bool $stillOwn Body param: `true` confirms you still own the number. `false` reports that you no longer own it and removes it from Number Reputation.
     * @param string $evidenceDocumentID body param: Optional id of an uploaded document supporting the confirmation
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function ownershipConfirm(
        string $phoneNumber,
        string $enterpriseID,
        bool $stillOwn,
        ?string $evidenceDocumentID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ReputationPhoneNumberWithReputation;

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

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveOwnership(
        string $phoneNumber,
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null,
    ): NumberGetOwnershipResponse;
}
