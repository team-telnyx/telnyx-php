<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ShortCodesRawContract;
use Telnyx\ShortCode;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListParams;
use Telnyx\ShortCodes\ShortCodeListParams\Filter;
use Telnyx\ShortCodes\ShortCodeUpdateParams;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

/**
 * Short codes.
 *
 * @phpstan-import-type FilterShape from \Telnyx\ShortCodes\ShortCodeListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ShortCodesRawService implements ShortCodesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a short code
     *
     * @param string $id The id of the short code
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ShortCodeGetResponse>
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
            path: ['short_codes/%1$s', $id],
            options: $requestOptions,
            convert: ShortCodeGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the settings for a specific short code. To unbind a short code from a profile, set the `messaging_profile_id` to `null` or an empty string.
     * To add or update tags, include the tags field as an array of strings.
     *
     * @param string $id The id of the short code
     * @param array{
     *   messagingProfileID: string, tags?: list<string>
     * }|ShortCodeUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ShortCodeUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ShortCodeUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ShortCodeUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['short_codes/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: ShortCodeUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List short codes
     *
     * @param array{
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|ShortCodeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ShortCode>>
     *
     * @throws APIException
     */
    public function list(
        array|ShortCodeListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ShortCodeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'short_codes',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: ShortCode::class,
            page: DefaultFlatPagination::class,
        );
    }
}
