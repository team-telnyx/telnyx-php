<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DocumentLinks\DocumentLinkListParams;
use Telnyx\DocumentLinks\DocumentLinkListParams\Filter;
use Telnyx\DocumentLinks\DocumentLinkListParams\Page;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentLinksRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\DocumentLinks\DocumentLinkListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\DocumentLinks\DocumentLinkListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DocumentLinksRawService implements DocumentLinksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all documents links ordered by created_at descending.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|DocumentLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<DocumentLinkListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|DocumentLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DocumentLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'document_links',
            query: $parsed,
            options: $options,
            convert: DocumentLinkListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
