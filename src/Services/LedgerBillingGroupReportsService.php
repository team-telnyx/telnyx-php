<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LedgerBillingGroupReportsContract;

/**
 * Ledger billing reports.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class LedgerBillingGroupReportsService implements LedgerBillingGroupReportsContract
{
    /**
     * @api
     */
    public LedgerBillingGroupReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new LedgerBillingGroupReportsRawService($client);
    }

    /**
     * @api
     *
     * Create a ledger billing group report, which aggregates ledger activity by billing group.
     *
     * @param int $month Month of the ledger billing group report
     * @param int $year Year of the ledger billing group report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?int $month = null,
        ?int $year = null,
        RequestOptions|array|null $requestOptions = null,
    ): LedgerBillingGroupReportNewResponse {
        $params = array_filter(
            ['month' => $month ?? Omitted::VALUE, 'year' => $year ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details and status of a previously created ledger billing group report.
     *
     * @param string $id The id of the ledger billing group report
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): LedgerBillingGroupReportGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
