<?php

declare(strict_types=1);

namespace Telnyx\Services\Reputation;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Reputation\Numbers\NumberGetResponse;
use Telnyx\Reputation\Numbers\NumberListParams;
use Telnyx\Reputation\Numbers\NumberRetrieveParams;
use Telnyx\ReputationPhoneNumberWithReputationData;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Reputation\NumbersRawContract;

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
     * Get reputation data for a specific phone number without requiring an `enterprise_id`.
     *
     * Same response as the enterprise-scoped endpoint. Uses cached data by default.
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param array{fresh?: bool}|NumberRetrieveParams $params
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

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['reputation/numbers/%1$s', $phoneNumber],
            query: $parsed,
            options: $options,
            convert: NumberGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all phone numbers enrolled in Number Reputation monitoring for your account. This is a simplified endpoint that does not require an `enterprise_id` — it returns numbers across all your enterprises.
     *
     * Supports pagination and filtering by phone number.
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, phoneNumber?: string
     * }|NumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ReputationPhoneNumberWithReputationData,>,>
     *
     * @throws APIException
     */
    public function list(
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
            path: 'reputation/numbers',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'phoneNumber' => 'phone_number',
                ],
            ),
            options: $options,
            convert: ReputationPhoneNumberWithReputationData::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Remove a phone number from Number Reputation monitoring without requiring an `enterprise_id`.
     *
     * @param string $phoneNumber Phone number in E.164 format
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['reputation/numbers/%1$s', $phoneNumber],
            options: $requestOptions,
            convert: null,
        );
    }
}
