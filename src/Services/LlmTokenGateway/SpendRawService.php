<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\LlmTokenGateway\Spend\SpendGetEventsResponse;
use Telnyx\LlmTokenGateway\Spend\SpendGetSummaryResponse;
use Telnyx\LlmTokenGateway\Spend\SpendGroupBy;
use Telnyx\LlmTokenGateway\Spend\SpendRetrieveEventsParams;
use Telnyx\LlmTokenGateway\Spend\SpendRetrieveSummaryParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\SpendRawContract;

/**
 * Manage and report AI Gateway usage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpendRawService implements SpendRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Return request-level usage history for the authenticated account. Supply both UTC dates or neither; omitting both returns the previous full UTC day. Dates use a half-open range [start_date, end_date) of at most 31 days. Cost reflects budget reference rates, not invoice charges. Unknown spend is excluded and reported separately. The report snapshot supports at most 10,000 matching requests, independently of page size. Exceeding this bound returns HTTP 503 without partial results. Narrow the date range or resource filters before retrying. A failed report must not be interpreted as zero usage. Request tags can filter either report and metadata:<key> can group the summary.
     *
     * @param array{
     *   endDate?: string,
     *   endUserID?: string,
     *   metadata?: array<string,string>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   pageSnapshot?: string,
     *   startDate?: string,
     *   tokenGroupID?: string,
     *   tokenKeyID?: string,
     *   tokenUserID?: string,
     * }|SpendRetrieveEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendGetEventsResponse>
     *
     * @throws APIException
     */
    public function retrieveEvents(
        array|SpendRetrieveEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpendRetrieveEventsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'llm_token_gateway/spend/events',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endDate' => 'end_date',
                    'endUserID' => 'end_user_id',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'pageSnapshot' => 'page[snapshot]',
                    'startDate' => 'start_date',
                    'tokenGroupID' => 'token_group_id',
                    'tokenKeyID' => 'token_key_id',
                    'tokenUserID' => 'token_user_id',
                ],
            ),
            options: $options,
            convert: SpendGetEventsResponse::class,
        );
    }

    /**
     * @api
     *
     * Return request counts, token counts and reference spend grouped by one attribution dimension. Both UTC dates and group_by are required. Dates use a half-open range [start_date, end_date) of at most 31 days. Cost reflects budget reference rates, not invoice charges. Unknown spend is excluded and reported separately. The report snapshot supports at most 10,000 matching requests, independently of page size. Exceeding this bound returns HTTP 503 without partial results. Narrow the date range or resource filters before retrying. A failed report must not be interpreted as zero usage. Request tags can filter either report and metadata:<key> can group the summary.
     *
     * @param array{
     *   endDate: string,
     *   groupBy: string|SpendGroupBy|value-of<SpendGroupBy>,
     *   startDate: string,
     *   endUserID?: string,
     *   metadata?: array<string,string>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   pageSnapshot?: string,
     *   tokenGroupID?: string,
     *   tokenKeyID?: string,
     *   tokenUserID?: string,
     * }|SpendRetrieveSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpendGetSummaryResponse>
     *
     * @throws APIException
     */
    public function retrieveSummary(
        array|SpendRetrieveSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpendRetrieveSummaryParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'llm_token_gateway/spend/summary',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'endDate' => 'end_date',
                    'groupBy' => 'group_by',
                    'startDate' => 'start_date',
                    'endUserID' => 'end_user_id',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'pageSnapshot' => 'page[snapshot]',
                    'tokenGroupID' => 'token_group_id',
                    'tokenKeyID' => 'token_key_id',
                    'tokenUserID' => 'token_user_id',
                ],
            ),
            options: $options,
            convert: SpendGetSummaryResponse::class,
        );
    }
}
