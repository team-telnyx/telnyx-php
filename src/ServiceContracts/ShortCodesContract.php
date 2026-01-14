<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ShortCode;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListParams\Filter;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\ShortCodes\ShortCodeListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ShortCodesContract
{
    /**
     * @api
     *
     * @param string $id The id of the short code
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): ShortCodeGetResponse;

    /**
     * @api
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
    ): ShortCodeUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ShortCode>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
