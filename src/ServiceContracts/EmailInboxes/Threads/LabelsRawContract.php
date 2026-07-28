<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes\Threads;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Threads\Labels\LabelCreateParams;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllParams;
use Telnyx\EmailInboxes\Threads\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Threads\Labels\LabelNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface LabelsRawContract
{
    /**
     * @api
     *
     * @param string $threadID path param: Thread UUID
     * @param array<string,mixed>|LabelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $threadID,
        array|LabelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $threadID path param: Thread UUID
     * @param array<string,mixed>|LabelDeleteAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelDeleteAllResponse>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $threadID,
        array|LabelDeleteAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
