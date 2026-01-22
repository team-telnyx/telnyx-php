<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\MessagingOptouts\MessagingOptoutListParams;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Page;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingOptoutsRawContract;

/**
 * @phpstan-import-type CreatedAtShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt
 * @phpstan-import-type FilterShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingOptoutsRawService implements MessagingOptoutsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of opt-out blocks.
     *
     * @param array{
     *   createdAt?: CreatedAt|CreatedAtShape,
     *   filter?: Filter|FilterShape,
     *   page?: Page|PageShape,
     *   redactionEnabled?: string,
     * }|MessagingOptoutListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<MessagingOptoutListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingOptoutListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessagingOptoutListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'messaging_optouts',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'createdAt' => 'created_at', 'redactionEnabled' => 'redaction_enabled',
                ],
            ),
            options: $options,
            convert: MessagingOptoutListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
