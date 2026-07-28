<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes\Messages;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To\UnionMember1;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\Messages\ActionsContract;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type ToShape from \Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To
 * @phpstan-import-type InboxActionRecipientInputShape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ActionsRawService($client);
    }

    /**
     * @api
     *
     * Sends from the inbox address through the standard email send pipeline to caller-supplied
     * To, Cc, and Bcc recipients. `to` must contain at least one recipient. Optional `text` and
     * `html` are prepended to a forwarded-message block containing the original metadata and
     * available body content. The subject is prefixed with `Fwd:` unless it already has that prefix.
     *
     * Threading headers are derived from the original message: `In-Reply-To` is set to its
     * RFC Message-ID, and `References` contains the original References values plus that
     * Message-ID, de-duplicated and limited to the most recent 20 values.
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
    ): EmailMessageResponse {
        $params = Util::removeNulls(
            [
                'inboxID' => $inboxID,
                'to' => $to,
                'bcc' => $bcc,
                'cc' => $cc,
                'html' => $html,
                'text' => $text,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->forward($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sends from the inbox address through the standard email send pipeline. The recipient is
     * the original `Reply-To`, falling back to `From`; original Cc recipients are not included.
     * The subject is prefixed with `Re:` unless it already has that prefix.
     *
     * Threading headers are derived from the original message: `In-Reply-To` is set to its
     * RFC Message-ID, and `References` contains the original References values plus that
     * Message-ID, de-duplicated and limited to the most recent 20 values.
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
    ): EmailMessageResponse {
        $params = Util::removeNulls(
            ['inboxID' => $inboxID, 'html' => $html, 'text' => $text]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->reply($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Sends from the inbox address through the standard email send pipeline. The To list starts
     * with the original `Reply-To` (or `From`) and includes original To recipients; the Cc list
     * includes original Cc recipients. The inbox address is excluded, and recipients are
     * de-duplicated case-insensitively across To and Cc. Bcc is always empty. The subject is
     * prefixed with `Re:` unless it already has that prefix.
     *
     * Threading headers are derived from the original message: `In-Reply-To` is set to its
     * RFC Message-ID, and `References` contains the original References values plus that
     * Message-ID, de-duplicated and limited to the most recent 20 values.
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
    ): EmailMessageResponse {
        $params = Util::removeNulls(
            ['inboxID' => $inboxID, 'html' => $html, 'text' => $text]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replyAll($messageID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
