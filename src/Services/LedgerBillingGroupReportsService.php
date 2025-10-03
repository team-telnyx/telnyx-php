<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportCreateParams;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LedgerBillingGroupReportsContract;

use const Telnyx\Core\OMIT as omit;

final class LedgerBillingGroupReportsService implements LedgerBillingGroupReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a ledger billing group report
     *
     * @param int $month Month of the ledger billing group report
     * @param int $year Year of the ledger billing group report
     *
     * @throws APIException
     */
    public function create(
        $month = omit,
        $year = omit,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportNewResponse {
        $params = ['month' => $month, 'year' => $year];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportNewResponse {
        [$parsed, $options] = LedgerBillingGroupReportCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ledger_billing_group_reports/%1$s', $id],
            options: $requestOptions,
            convert: LedgerBillingGroupReportGetResponse::class,
        );
    }
}
