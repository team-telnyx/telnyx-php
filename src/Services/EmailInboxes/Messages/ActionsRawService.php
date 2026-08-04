<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes\Messages;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams;
use Telnyx\EmailInboxes\Messages\Actions\ActionReplyAllParams;
use Telnyx\EmailInboxes\Messages\Actions\ActionReplyParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\Messages\ActionsRawContract;

/**
 * Create and manage agent inboxes, retrieve inbound messages and threads, and reply to or forward messages.
 *
 * @phpstan-import-type ToShape from \Telnyx\EmailInboxes\Messages\Actions\ActionForwardParams\To
 * @phpstan-import-type InboxActionRecipientInputShape from \Telnyx\EmailInboxes\Messages\Actions\InboxActionRecipientInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   inboxID: string,
     *   to: ToShape,
     *   bcc?: InboxActionRecipientInputShape,
     *   cc?: InboxActionRecipientInputShape,
     *   html?: string,
     *   text?: string,
     * }|ActionForwardParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ActionForwardParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'email_inboxes/%1$s/messages/%2$s/actions/forward', $inboxID, $messageID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: EmailMessageResponse::class,
        );
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
     * @param array{
     *   inboxID: string, html?: string, text?: string
     * }|ActionReplyParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ActionReplyParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'email_inboxes/%1$s/messages/%2$s/actions/reply', $inboxID, $messageID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: EmailMessageResponse::class,
        );
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
     * @param array{
     *   inboxID: string, html?: string, text?: string
     * }|ActionReplyAllParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ActionReplyAllParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'email_inboxes/%1$s/messages/%2$s/actions/reply_all',
                $inboxID,
                $messageID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: EmailMessageResponse::class,
        );
    }
}
