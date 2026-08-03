<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes\Messages;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Messages\Labels\LabelCreateParams;
use Telnyx\EmailInboxes\Messages\Labels\LabelDeleteAllParams;
use Telnyx\EmailInboxes\Messages\Labels\LabelDeleteAllResponse;
use Telnyx\EmailInboxes\Messages\Labels\LabelNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface LabelsRawContract
{
    /**
     * @api
     *
     * @param string $messageID path param: Inbound message UUID
     * @param array<string,mixed>|LabelCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $messageID,
        array|LabelCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID path param: Inbound message UUID
     * @param array<string,mixed>|LabelDeleteAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<LabelDeleteAllResponse>
     *
     * @throws APIException
     */
    public function deleteAll(
        string $messageID,
        array|LabelDeleteAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
