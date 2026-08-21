<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailBlocks\EmailBlock;
use Telnyx\EmailBlocks\EmailBlockGetEventsResponse;
use Telnyx\EmailBlocks\EmailBlockListParams\FilterReason;
use Telnyx\EmailBlocks\EmailBlockListParams\Sort;
use Telnyx\EmailBlocks\EmailBlockResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailBlocksContract
{
    /**
     * @api
     *
     * @param string $to recipient address (normalized: trim + lower-case)
     * @param string|null $domainID `null` ⇒ account scope
     * @param string|null $from Sender address (normalized). `null` ⇒ account/domain scope.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $to,
        ?string $domainID = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $from = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailBlockResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailBlockResponse;

    /**
     * @api
     *
     * @param \DateTimeInterface $filterCreatedAfter `created_at > value` (ISO 8601)
     * @param \DateTimeInterface $filterCreatedBefore `created_at < value` (ISO 8601)
     * @param string $filterDomainID exact-match filter on domain_id (UUID)
     * @param FilterReason|value-of<FilterReason> $filterReason exact-match filter on reason
     * @param string $pageAfter Opaque cursor (`Base.url_encode64` of `{"created_at","id"}`). Cursor mode; mutually exclusive with `page[number]` and `page[before]`.
     * @param string $pageBefore Opaque cursor (see `page[after]`). Mutually exclusive with `page[after]` and `page[number]`.
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (1–100, default 25)
     * @param Sort|value-of<Sort> $sort Sort field. Leading `-` = desc; only `created_at` is sortable. Default `-created_at`. `--` is an error.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EmailBlock>
     *
     * @throws APIException
     */
    public function list(
        ?\DateTimeInterface $filterCreatedAfter = null,
        ?\DateTimeInterface $filterCreatedBefore = null,
        ?string $filterDomainID = null,
        FilterReason|string|null $filterReason = null,
        ?string $pageAfter = null,
        ?string $pageBefore = null,
        int $pageNumber = 1,
        int $pageSize = 25,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailBlockResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (default 50, max 100)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EmailBlockGetEventsResponse>
     *
     * @throws APIException
     */
    public function retrieveEvents(
        string $id,
        int $pageNumber = 1,
        int $pageSize = 50,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param \DateTimeInterface $filterCreatedAfter `created_at > value` (ISO 8601)
     * @param \DateTimeInterface $filterCreatedBefore `created_at < value` (ISO 8601)
     * @param string $filterDomainID exact-match filter on domain_id (UUID)
     * @param \Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\FilterReason|value-of<\Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\FilterReason> $filterReason exact-match filter on reason
     * @param int $pageNumber offset page number (≥1, default 1)
     * @param int $pageSize page size (1–100, default 25)
     * @param \Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\Sort|value-of<\Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\Sort> $sort Sort field. Leading `-` = desc; only `created_at` is sortable. Default `-created_at`. `--` is an error.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveExport(
        ?\DateTimeInterface $filterCreatedAfter = null,
        ?\DateTimeInterface $filterCreatedBefore = null,
        ?string $filterDomainID = null,
        \Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\FilterReason|string|null $filterReason = null,
        int $pageNumber = 1,
        int $pageSize = 25,
        \Telnyx\EmailBlocks\EmailBlockRetrieveExportParams\Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
