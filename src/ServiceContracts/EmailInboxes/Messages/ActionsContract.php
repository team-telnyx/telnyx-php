<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes\Messages;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To\UnionMember1;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ToShape from \Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To
 * @phpstan-import-type InboxActionRecipientInputShape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ActionsContract
{
    /**
     * @api
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param ToShape $to Body param: One recipient or a non-empty recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     * @param InboxActionRecipientInputShape $bcc Body param: One recipient or a recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     * @param InboxActionRecipientInputShape $cc Body param: One recipient or a recipient array. Each recipient may be an email string or an object with `email` and optional `name`.
     * @param string $html Body param: Optional HTML note prepended to the generated forwarded-message block. Blank values are treated as omitted.
     * @param string $text Body param: Optional plain-text note prepended to the generated forwarded-message block. Blank values are treated as omitted.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function forward(
        string $messageID,
        string $inboxID,
        string|UnionMember1|array $to,
        string|\Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput\UnionMember1|array|null $bcc = null,
        string|\Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput\UnionMember1|array|null $cc = null,
        ?string $html = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailMessageResponse;

    /**
     * @api
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param string $html body param: HTML reply body
     * @param string $text body param: Plain-text reply body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function reply(
        string $messageID,
        string $inboxID,
        ?string $html = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailMessageResponse;

    /**
     * @api
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param string $inboxID path param: Email inbox UUID
     * @param string $html body param: HTML reply body
     * @param string $text body param: Plain-text reply body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replyAll(
        string $messageID,
        string $inboxID,
        ?string $html = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailMessageResponse;
}
