<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\VoiceSDKCallReportsContract;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReport;
use Telnyx\VoiceSDKCallReports\VoiceSDKCallReportListParams\Sort;

/**
 * Retrieve raw Voice SDK call report stats payloads for WebRTC call troubleshooting.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VoiceSDKCallReportsService implements VoiceSDKCallReportsContract
{
    /**
     * @api
     */
    public VoiceSDKCallReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VoiceSDKCallReportsRawService($client);
    }

    /**
     * @api
     *
     * Returns raw call report stats JSON payloads stored for the authenticated user and `call_id`. The user is derived from Telnyx authentication, not from request parameters.
     *
     * @param string $callID call identifier used to retrieve reports owned by the authenticated user
     * @param RequestOpts|null $requestOptions
     *
     * @return list<VoiceSDKCallReport>
     *
     * @throws APIException
     */
    public function retrieve(
        string $callID,
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($callID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns paginated raw call report stats JSON payloads stored for the authenticated user. The user is derived from Telnyx authentication, not from request parameters.
     *
     * @param Sort|value-of<Sort> $sort Set the order of the results by creation date. `asc` and `created_at` sort oldest reports first; `desc` and `-created_at` sort newest reports first. If not given, results are sorted by creation date in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<VoiceSDKCallReport>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string $sort = 'desc',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
