<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\BulkSimCardActions\BulkSimCardActionListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BulkSimCardActionsContract;

/**
 * View SIM card actions, their progress and timestamps using the SIM Card Actions API.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BulkSimCardActionsService implements BulkSimCardActionsContract
{
    /**
     * @api
     */
    public BulkSimCardActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BulkSimCardActionsRawService($client);
    }

    /**
     * @api
     *
     * This API fetches information about a bulk SIM card action. A bulk SIM card action contains details about a collection of individual SIM card actions.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BulkSimCardActionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This API lists a paginated collection of bulk SIM card actions. A bulk SIM card action contains details about a collection of individual SIM card actions.
     *
     * @param FilterActionType|value-of<FilterActionType> $filterActionType filter by action type
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<BulkSimCardActionListResponse>
     *
     * @throws APIException
     */
    public function list(
        FilterActionType|string|null $filterActionType = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterActionType' => $filterActionType,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
