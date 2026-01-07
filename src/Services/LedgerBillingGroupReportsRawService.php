<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportCreateParams;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LedgerBillingGroupReportsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class LedgerBillingGroupReportsRawService implements LedgerBillingGroupReportsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a ledger billing group report
     *
     * @param array{
     *   month?: int, year?: int
     * }|LedgerBillingGroupReportCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LedgerBillingGroupReportNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|LedgerBillingGroupReportCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = LedgerBillingGroupReportCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ledger_billing_group_reports',
            body: (object) $parsed,
            options: $options,
            convert: LedgerBillingGroupReportNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a ledger billing group report
     *
     * @param string $id The id of the ledger billing group report
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LedgerBillingGroupReportGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ledger_billing_group_reports/%1$s', $id],
            options: $requestOptions,
            convert: LedgerBillingGroupReportGetResponse::class,
        );
    }
}
