<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\BulkSimCardActions\BulkSimCardActionListResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BulkSimCardActionsContract;

use const Telnyx\Core\OMIT as omit;

final class BulkSimCardActionsService implements BulkSimCardActionsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API fetches information about a bulk SIM card action. A bulk SIM card action contains details about a collection of individual SIM card actions.
     *
     * @return BulkSimCardActionGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BulkSimCardActionGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['bulk_sim_card_actions/%1$s', $id],
            options: $requestOptions,
            convert: BulkSimCardActionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * This API lists a paginated collection of bulk SIM card actions. A bulk SIM card action contains details about a collection of individual SIM card actions.
     *
     * @param FilterActionType|value-of<FilterActionType> $filterActionType filter by action type
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     *
     * @return BulkSimCardActionListResponse<HasRawResponse>
     */
    public function list(
        $filterActionType = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): BulkSimCardActionListResponse {
        [$parsed, $options] = BulkSimCardActionListParams::parseRequest(
            [
                'filterActionType' => $filterActionType,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'bulk_sim_card_actions',
            query: $parsed,
            options: $options,
            convert: BulkSimCardActionListResponse::class,
        );
    }
}
