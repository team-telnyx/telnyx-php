<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Threads\InboundThreadListResponse;
use Telnyx\EmailInboxes\Threads\ThreadGetResponse;
use Telnyx\EmailInboxes\Threads\ThreadListParams;
use Telnyx\EmailInboxes\Threads\ThreadRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ThreadsRawContract
{
    /**
     * @api
     *
     * @param string $threadID path param: Email thread UUID
     * @param array<string,mixed>|ThreadRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ThreadGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $threadID,
        array|ThreadRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param array<string,mixed>|ThreadListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InboundThreadListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        array|ThreadListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
