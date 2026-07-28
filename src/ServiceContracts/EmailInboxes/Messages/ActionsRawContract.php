<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes\Messages;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams;
use Telnyx\EmailInboxes\Messages\Actions\ActionReplyAllParams;
use Telnyx\EmailInboxes\Messages\Actions\ActionReplyParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsRawContract
{
    /**
     * @api
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param array<string,mixed>|ActionForwardParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageResponse>
     *
     * @throws APIException
     */
    public function forward(
        string $messageID,
        array|ActionForwardParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param array<string,mixed>|ActionReplyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageResponse>
     *
     * @throws APIException
     */
    public function reply(
        string $messageID,
        array|ActionReplyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param array<string,mixed>|ActionReplyAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageResponse>
     *
     * @throws APIException
     */
    public function replyAll(
        string $messageID,
        array|ActionReplyAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
