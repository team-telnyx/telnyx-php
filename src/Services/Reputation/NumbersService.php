<?php

declare(strict_types=1);

namespace Telnyx\Services\Reputation;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberWithReputation;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reputation\NumbersContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumbersService implements NumbersContract
{
    /**
     * @api
     */
    public NumbersRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new NumbersRawService($client);
    }

    /**
     * @api
     *
     * Convenience alias for `GET /v2/enterprises/{enterprise_id}/reputation/numbers/{phone_number}`.
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
    ): ReputationPhoneNumberWithReputation {
        $params = Util::removeNulls(['fresh' => $fresh]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($phoneNumber, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Convenience alias for `GET /v2/enterprises/{enterprise_id}/reputation/numbers` that returns numbers across every enterprise you own. Useful when you don't want to look up the enterprise id first.
     *
     * @param string $filterEnterpriseID filter by enterprise ID
     * @param string $filterPhoneNumberContains Partial match on phone number. Must contain at least 5 digits.
     * @param string $filterPhoneNumberEq Exact phone-number match (E.164).
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
        ?string $filterPhoneNumberContains = null,
        ?string $filterPhoneNumberEq = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterEnterpriseID' => $filterEnterpriseID,
                'filterPhoneNumberContains' => $filterPhoneNumberContains,
                'filterPhoneNumberEq' => $filterPhoneNumberEq,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Convenience alias for `DELETE /v2/enterprises/{enterprise_id}/reputation/numbers/{phone_number}`.
     *
     * @param string $phoneNumber Phone number in E.164 format (`+1NPANXXXXXX` for US/CA). The leading `+` MUST be URL-encoded as `%2B` (e.g. `%2B19493253498`).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($phoneNumber, requestOptions: $requestOptions);

        return $response->parse();
    }
}
