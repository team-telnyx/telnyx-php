<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailBracketCursorPagination;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Messages\MessageDraftsParams;
use Telnyx\EmailInboxes\Messages\MessageListParams;
use Telnyx\EmailInboxes\Messages\MessageUpdateParams;
use Telnyx\EmailInboxes\Messages\MessageUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\Webhooks\InboundMessage;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagesRawContract
{
    /**
     * @api
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param array<string,mixed>|MessageUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $messageID,
        array|MessageUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param array<string,mixed>|MessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailBracketCursorPagination<InboundMessage>>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        array|MessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messageID path param: Inbound message UUID to reply to
     * @param array<string,mixed>|MessageDraftsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDraftResponse>
     *
     * @throws APIException
     */
    public function drafts(
        string $messageID,
        array|MessageDraftsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
