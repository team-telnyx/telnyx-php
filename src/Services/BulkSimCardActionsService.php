<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams;
use Telnyx\BulkSimCardActions\BulkSimCardActionListParams\FilterActionType;
use Telnyx\BulkSimCardActions\BulkSimCardActionListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BulkSimCardActionsContract;

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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BulkSimCardActionGetResponse {
        /** @var BaseResponse<BulkSimCardActionGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['bulk_sim_card_actions/%1$s', $id],
            options: $requestOptions,
            convert: BulkSimCardActionGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This API lists a paginated collection of bulk SIM card actions. A bulk SIM card action contains details about a collection of individual SIM card actions.
     *
     * @param array{
     *   filter_action_type_?: 'bulk_set_public_ips'|FilterActionType,
     *   page_number_?: int,
     *   page_size_?: int,
     * }|BulkSimCardActionListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|BulkSimCardActionListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BulkSimCardActionListResponse {
        [$parsed, $options] = BulkSimCardActionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BulkSimCardActionListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'bulk_sim_card_actions',
            query: $parsed,
            options: $options,
            convert: BulkSimCardActionListResponse::class,
        );

        return $response->parse();
    }
}
