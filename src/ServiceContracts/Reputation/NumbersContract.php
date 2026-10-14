<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Reputation;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\ReputationNumberSource;
use Telnyx\Enterprises\Reputation\Numbers\ReputationOwnershipStatus;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber;
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
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param bool $fresh When true, fetches fresh reputation data (incurs API cost). When false (default), returns cached data.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        bool $fresh = false,
        RequestOptions|array|null $requestOptions = null,
    ): ReputationPhoneNumberWithReputation;

    /**
     * @api
     *
     * @param string $filterEnterpriseID filter by enterprise ID
     * @param ReputationOwnershipStatus|value-of<ReputationOwnershipStatus> $filterOwnershipStatus Only numbers with this ownership status. `removed` lists the numbers that were removed, each with its `removal_reason` and `removed_at`; removed numbers are not returned otherwise.
     * @param string $filterPhoneNumberContains Partial match on phone number. Must contain at least 5 digits.
     * @param string $filterPhoneNumberEq Exact phone-number match (E.164).
     * @param ReputationNumberSource|value-of<ReputationNumberSource> $filterSource only numbers with this source
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ReputationPhoneNumber>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterEnterpriseID = null,
        ReputationOwnershipStatus|string|null $filterOwnershipStatus = null,
        ?string $filterPhoneNumberContains = null,
        ?string $filterPhoneNumberEq = null,
        ReputationNumberSource|string|null $filterSource = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
