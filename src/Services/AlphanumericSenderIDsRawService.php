<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AlphanumericSenderIDs\AlphanumericSenderID;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDCreateParams;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDDeleteResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDGetResponse;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDListParams;
use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDNewResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AlphanumericSenderIDsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AlphanumericSenderIDsRawService implements AlphanumericSenderIDsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new alphanumeric sender ID associated with a messaging profile.
     *
     * @param array{
     *   alphanumericSenderID: string,
     *   messagingProfileID: string,
     *   usLongCodeFallback?: string,
     * }|AlphanumericSenderIDCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AlphanumericSenderIDNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AlphanumericSenderIDCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AlphanumericSenderIDCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'alphanumeric_sender_ids',
            body: (object) $parsed,
            options: $options,
            convert: AlphanumericSenderIDNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a specific alphanumeric sender ID.
     *
     * @param string $id the identifier of the alphanumeric sender ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AlphanumericSenderIDGetResponse>
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
            path: ['alphanumeric_sender_ids/%1$s', $id],
            options: $requestOptions,
            convert: AlphanumericSenderIDGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all alphanumeric sender IDs for the authenticated user.
     *
     * @param array{
     *   filterMessagingProfileID?: string, pageNumber?: int, pageSize?: int
     * }|AlphanumericSenderIDListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AlphanumericSenderID>>
     *
     * @throws APIException
     */
    public function list(
        array|AlphanumericSenderIDListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AlphanumericSenderIDListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'alphanumeric_sender_ids',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterMessagingProfileID' => 'filter[messaging_profile_id]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: AlphanumericSenderID::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete an alphanumeric sender ID and disassociate it from its messaging profile.
     *
     * @param string $id the identifier of the alphanumeric sender ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AlphanumericSenderIDDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['alphanumeric_sender_ids/%1$s', $id],
            options: $requestOptions,
            convert: AlphanumericSenderIDDeleteResponse::class,
        );
    }
}
