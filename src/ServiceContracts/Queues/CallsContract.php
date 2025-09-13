<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Queues;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Queues\Calls\CallGetResponse;
use Telnyx\Queues\Calls\CallListParams\Page;
use Telnyx\Queues\Calls\CallListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface CallsContract
{
    /**
     * @api
     *
     * @param string $queueName
     *
     * @return CallGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $callControlID,
        $queueName,
        ?RequestOptions $requestOptions = null,
    ): CallGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[after], page[before], page[limit], page[size], page[number]
     *
     * @return CallListResponse<HasRawResponse>
     */
    public function list(
        string $queueName,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): CallListResponse;
}
