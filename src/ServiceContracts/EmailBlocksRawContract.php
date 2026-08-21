<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailBlocks\EmailBlock;
use Telnyx\EmailBlocks\EmailBlockCreateParams;
use Telnyx\EmailBlocks\EmailBlockGetEventsResponse;
use Telnyx\EmailBlocks\EmailBlockListParams;
use Telnyx\EmailBlocks\EmailBlockResponse;
use Telnyx\EmailBlocks\EmailBlockRetrieveEventsParams;
use Telnyx\EmailBlocks\EmailBlockRetrieveExportParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailBlocksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailBlockCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailBlockCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailBlockListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailBlock>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailBlockListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param array<string,mixed>|EmailBlockRetrieveEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailBlockGetEventsResponse>>
     *
     * @throws APIException
     */
    public function retrieveEvents(
        string $id,
        array|EmailBlockRetrieveEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailBlockRetrieveExportParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveExport(
        array|EmailBlockRetrieveExportParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
