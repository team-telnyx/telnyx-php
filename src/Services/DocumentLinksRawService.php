<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DocumentLinks\DocumentLinkListParams;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentLinksRawContract;

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
     *   filter?: array{linkedRecordType?: string, linkedResourceID?: string},
     *   page?: array{number?: int, size?: int},
     * }|DocumentLinkListParams $params
     *
     * @return BaseResponse<DefaultPagination<DocumentLinkListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|DocumentLinkListParams $params,
        ?RequestOptions $requestOptions = null
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
