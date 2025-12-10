<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportGetResponse;
use Telnyx\LedgerBillingGroupReports\LedgerBillingGroupReportNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LedgerBillingGroupReportsContract;

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
     * Create a ledger billing group report
     *
     * @param int $month Month of the ledger billing group report
     * @param int $year Year of the ledger billing group report
     *
     * @throws APIException
     */
    public function create(
        ?int $month = null,
        ?int $year = null,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportNewResponse {
        $params = Util::removeNulls(['month' => $month, 'year' => $year]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a ledger billing group report
     *
     * @param string $id The id of the ledger billing group report
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): LedgerBillingGroupReportGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
