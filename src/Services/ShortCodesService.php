<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ShortCodesContract;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListParams;
use Telnyx\ShortCodes\ShortCodeListParams\Filter;
use Telnyx\ShortCodes\ShortCodeListParams\Page;
use Telnyx\ShortCodes\ShortCodeListResponse;
use Telnyx\ShortCodes\ShortCodeUpdateParams;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

use const Telnyx\Core\OMIT as omit;

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
        // @phpstan-ignore-next-line;
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
     *
     * @param string $messagingProfileID unique identifier for a messaging profile
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): ShortCodeUpdateResponse {
        $params = ['messagingProfileID' => $messagingProfileID];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ShortCodeUpdateResponse {
        [$parsed, $options] = ShortCodeUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ShortCodeListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ShortCodeListResponse {
        [$parsed, $options] = ShortCodeListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'short_codes',
            query: $parsed,
            options: $options,
            convert: ShortCodeListResponse::class,
        );
    }
}
