<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberAssociateResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberDisassociateParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberGetResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberListParams;
use Telnyx\Enterprises\Reputation\Numbers\NumberListResponse;
use Telnyx\Enterprises\Reputation\Numbers\NumberRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\NumbersRawContract;

/**
 * Associate phone numbers with an enterprise for reputation monitoring and retrieve reputation scores.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class NumbersRawService implements NumbersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get detailed reputation data for a specific phone number associated with an enterprise.
     *
     * **Query Parameters:**
     * - `fresh` (default: `false`): When `true`, fetches fresh reputation data (incurs API cost). When `false`, returns cached data. If no cached data exists, fresh data is automatically fetched.
     *
     * **Returns:**
     * - `spam_risk`: Overall spam risk level (`low`, `medium`, `high`)
     * - `spam_category`: Spam category classification
     * - `maturity_score`: Maturity metric (0–100)
     * - `connection_score`: Connection quality metric (0–100)
     * - `engagement_score`: Engagement metric (0–100)
     * - `sentiment_score`: Sentiment metric (0–100)
     * - `last_refreshed_at`: Timestamp of last data refresh
     *
     * @param string $phoneNumber Path param: Phone number in E.164 format
     * @param array{enterpriseID: string, fresh?: bool}|NumberRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        array|NumberRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $enterpriseID = $parsed['enterpriseID'];
        unset($parsed['enterpriseID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'enterprises/%1$s/reputation/numbers/%2$s', $enterpriseID, $phoneNumber,
            ],
            query: $parsed,
            options: $options,
            convert: NumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all phone numbers associated with an enterprise for Number Reputation monitoring.
     *
     * Returns phone numbers with their cached reputation data (if available). Supports pagination and filtering by phone number.
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param array{
     *   pageNumber?: int, pageSize?: int, phoneNumber?: string
     * }|NumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NumberListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        array|NumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['enterprises/%1$s/reputation/numbers', $enterpriseID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'phoneNumber' => 'phone_number',
                ],
            ),
            options: $options,
            convert: NumberListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Associate one or more phone numbers with an enterprise for Number Reputation monitoring.
     *
     * **Validations:**
     * - Phone numbers must be in E.164 format (e.g., `+16035551234`)
     * - Phone numbers must be in-service and belong to your account (verified via Warehouse)
     * - Phone numbers must be US local numbers
     * - Phone numbers cannot already be associated with any enterprise
     *
     * **Note:** This operation is atomic — if any number fails validation, the entire request fails.
     *
     * **Maximum:** 100 phone numbers per request.
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
     * @param array{phoneNumbers: list<string>}|NumberAssociateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NumberAssociateResponse>
     *
     * @throws APIException
     */
    public function associate(
        string $enterpriseID,
        array|NumberAssociateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberAssociateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/reputation/numbers', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: NumberAssociateResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove a phone number from Number Reputation monitoring for an enterprise.
     *
     * The number will no longer be tracked and reputation data will no longer be refreshed.
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param array{enterpriseID: string}|NumberDisassociateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function disassociate(
        string $phoneNumber,
        array|NumberDisassociateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = NumberDisassociateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $enterpriseID = $parsed['enterpriseID'];
        unset($parsed['enterpriseID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'enterprises/%1$s/reputation/numbers/%2$s', $enterpriseID, $phoneNumber,
            ],
            options: $options,
            convert: null,
        );
    }
}
