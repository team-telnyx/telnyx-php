<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Remediation\RemediationCreateParams;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListParams;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationRequestWrapped;
use Telnyx\Enterprises\Reputation\Remediation\RemediationRetrieveParams;
use Telnyx\Enterprises\Reputation\Remediation\RemediationStatus;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\RemediationRawContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RemediationRawService implements RemediationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit a batch of phone numbers belonging to this enterprise for reputation remediation. The request is accepted asynchronously: this endpoint returns `202` with the persisted request id, then the request transitions through processing states until completion. Use the GET endpoints to poll status and per-number results.
     *
     * Each phone number must be in E.164 format and belong to this enterprise. A number that already has an in-flight remediation request is rejected.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   callPurpose: string,
     *   phoneNumbers: list<string>,
     *   contactEmail?: string,
     *   webhookURL?: string,
     * }|RemediationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RemediationRequestWrapped>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array|RemediationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RemediationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/reputation/remediation', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: RemediationRequestWrapped::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the full detail of a remediation request, including current status, per-number results (once available), and submission metadata.
     *
     * @param string $remediationID The remediation request id. Lowercase UUID.
     * @param array{enterpriseID: string}|RemediationRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RemediationRequestWrapped>
     *
     * @throws APIException
     */
    public function retrieve(
        string $remediationID,
        array|RemediationRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RemediationRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $enterpriseID = $parsed['enterpriseID'];
        unset($parsed['enterpriseID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'enterprises/%1$s/reputation/remediation/%2$s',
                $enterpriseID,
                $remediationID,
            ],
            options: $options,
            convert: RemediationRequestWrapped::class,
        );
    }

    /**
     * @api
     *
     * Paginated list of remediation requests for this enterprise. List items omit per-number results and webhook URLs to keep the response small; call GET by id for full detail. Supports JSON:API pagination and optional filters on status and created-at range.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   filterCreatedAtGte?: \DateTimeInterface,
     *   filterCreatedAtLte?: \DateTimeInterface,
     *   filterStatus?: RemediationStatus|value-of<RemediationStatus>,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|RemediationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<RemediationListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        array|RemediationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = RemediationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['enterprises/%1$s/reputation/remediation', $enterpriseID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCreatedAtGte' => 'filter[created_at][gte]',
                    'filterCreatedAtLte' => 'filter[created_at][lte]',
                    'filterStatus' => 'filter[status]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: RemediationListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
