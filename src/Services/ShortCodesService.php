<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ShortCodesContract;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListParams;
use Telnyx\ShortCodes\ShortCodeListResponse;
use Telnyx\ShortCodes\ShortCodeUpdateParams;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

final class ShortCodesService implements ShortCodesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a short code
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ShortCodeGetResponse {
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
     * @param array{
     *   messaging_profile_id: string, tags?: list<string>
     * }|ShortCodeUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|ShortCodeUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ShortCodeUpdateResponse {
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
     *   filter?: array{messaging_profile_id?: string},
     *   page?: array{number?: int, size?: int},
     * }|ShortCodeListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|ShortCodeListParams $params,
        ?RequestOptions $requestOptions = null
    ): ShortCodeListResponse {
        [$parsed, $options] = ShortCodeListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'short_codes',
            query: $parsed,
            options: $options,
            convert: ShortCodeListResponse::class,
        );
    }
}
