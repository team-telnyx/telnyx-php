<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\ShortCodesContract;
use Telnyx\ShortCode;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListParams\Filter;
use Telnyx\ShortCodes\ShortCodeListParams\Page;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\ShortCodes\ShortCodeListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\ShortCodes\ShortCodeListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ShortCodesService implements ShortCodesContract
{
    /**
     * @api
     */
    public ShortCodesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ShortCodesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a short code
     *
     * @param string $id The id of the short code
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ShortCodeGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the settings for a specific short code. To unbind a short code from a profile, set the `messaging_profile_id` to `null` or an empty string.
     * To add or update tags, include the tags field as an array of strings.
     *
     * @param string $id The id of the short code
     * @param string $messagingProfileID unique identifier for a messaging profile
     * @param list<string> $tags
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $messagingProfileID,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): ShortCodeUpdateResponse {
        $params = Util::removeNulls(
            ['messagingProfileID' => $messagingProfileID, 'tags' => $tags]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List short codes
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<ShortCode>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(['filter' => $filter, 'page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
