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
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BulkSimCardActionsRawContract;

/**
 * View SIM card actions, their progress and timestamps using the SIM Card Actions API.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BulkSimCardActionsRawService implements BulkSimCardActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This API fetches information about a bulk SIM card action. A bulk SIM card action contains details about a collection of individual SIM card actions.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BulkSimCardActionGetResponse>
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
     * @param array{
     *   filterActionType?: FilterActionType|value-of<FilterActionType>,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|BulkSimCardActionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<BulkSimCardActionListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|BulkSimCardActionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BulkSimCardActionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'bulk_sim_card_actions',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterActionType' => 'filter[action_type]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: BulkSimCardActionListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
