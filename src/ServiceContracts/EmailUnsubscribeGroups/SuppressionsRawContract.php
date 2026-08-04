<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailUnsubscribeGroups;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\EmailBlocks\EmailBlock;
use Telnyx\EmailBlocks\EmailBlockResponse;
use Telnyx\EmailUnsubscribeGroups\Suppressions\SuppressionCreateParams;
use Telnyx\EmailUnsubscribeGroups\Suppressions\SuppressionDeleteParams;
use Telnyx\EmailUnsubscribeGroups\Suppressions\SuppressionListParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SuppressionsRawContract
{
    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param array<string,mixed>|SuppressionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBlockResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|SuppressionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Resource UUID. Malformed UUIDs are treated as not-found (not 400).
     * @param array<string,mixed>|SuppressionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EmailBlock>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|SuppressionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $email recipient address (normalized: trim + lower-case before matching)
     * @param array<string,mixed>|SuppressionDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $email,
        array|SuppressionDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
