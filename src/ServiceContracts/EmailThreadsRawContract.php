<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailBracketCursorPagination;
use Telnyx\EmailInboxes\Threads\InboundThread;
use Telnyx\EmailThreads\EmailThreadGetResponse;
use Telnyx\EmailThreads\EmailThreadListParams;
use Telnyx\EmailThreads\EmailThreadRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailThreadsRawContract
{
    /**
     * @api
     *
     * @param string $threadID email thread UUID
     * @param array<string,mixed>|EmailThreadRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailThreadGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $threadID,
        array|EmailThreadRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailThreadListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBracketCursorPagination<InboundThread>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailThreadListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
