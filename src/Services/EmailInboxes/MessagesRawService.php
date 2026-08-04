<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Messages\MessageDraftsParams;
use Telnyx\EmailInboxes\Messages\MessageListParams;
use Telnyx\EmailInboxes\Messages\MessageListResponse;
use Telnyx\EmailInboxes\Messages\MessageUpdateParams;
use Telnyx\EmailInboxes\Messages\MessageUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\MessagesRawContract;

/**
 * @phpstan-import-type ReadAtShape from \Telnyx\EmailInboxes\Messages\MessageUpdateParams\ReadAt
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 */
final class MessagesRawService implements MessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Updates the explicit read state of an account-scoped inbound message. Set `read_at`
     * to `true` to mark the message read at the server's current time, to an ISO 8601
     * timestamp to use that timestamp, or to `null` to mark the message unread. Repeating
     * the same update is idempotent.
     *
     * @param string $messageID path param: Inbound email message UUID
     * @param array{inboxID: string, readAt: ReadAtShape}|MessageUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MessageUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['email_inboxes/%1$s/messages/%2$s', $inboxID, $messageID],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: MessageUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists inbound messages newest first. All access is scoped to the authenticated
     * account. `filter[search]` performs PostgreSQL full-text search over the subject,
     * plain-text body, and HTML body. Filters compose with stable cursor pagination.
     *
     * @param string $inboxID email inbox UUID
     * @param array{
     *   filterFrom?: string,
     *   filterLabel?: string,
     *   filterRead?: bool,
     *   filterReceivedAfter?: \DateTimeInterface,
     *   filterReceivedBefore?: \DateTimeInterface,
     *   filterSearch?: string,
     *   filterSubject?: string,
     *   filterUnread?: bool,
     *   pageAfter?: string,
     *   pageSize?: int,
     * }|MessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        array|MessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_inboxes/%1$s/messages', $inboxID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterFrom' => 'filter[from]',
                    'filterLabel' => 'filter[label]',
                    'filterRead' => 'filter[read]',
                    'filterReceivedAfter' => 'filter[received_after]',
                    'filterReceivedBefore' => 'filter[received_before]',
                    'filterSearch' => 'filter[search]',
                    'filterSubject' => 'filter[subject]',
                    'filterUnread' => 'filter[unread]',
                    'pageAfter' => 'page[after]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: MessageListResponse::class,
        );
    }

    /**
     * @api
     *
     * Creates an unsent reply draft for an inbound message. Unlike the
     * `/actions/reply` endpoint, which sends immediately, this stores a draft that can
     * be reviewed and edited before sending.
     *
     * `reply_to_message_id` and `thread_id` are inherited from the parent message and
     * cannot be set by the caller. The recipient, `Re:` subject and
     * `In-Reply-To`/`References` headers are pre-filled from the parent using the same
     * rules as a live reply, so sending the draft threads identically. Supplying `to`
     * or `subject` explicitly overrides the pre-filled value.
     *
     * @param string $messageID path param: Inbound message UUID to reply to
     * @param array{
     *   inboxID: string,
     *   attachments?: list<mixed>,
     *   bcc?: list<EmailAddressInputShape>,
     *   cc?: list<EmailAddressInputShape>,
     *   fromEmail?: string,
     *   fromName?: string,
     *   headers?: array<string,string>,
     *   html?: string,
     *   htmlBody?: string,
     *   labels?: list<string>,
     *   metadata?: mixed,
     *   replyTo?: string,
     *   subject?: string,
     *   tags?: list<string>,
     *   text?: string,
     *   textBody?: string,
     *   to?: list<EmailAddressInputShape>,
     * }|MessageDraftsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MessageDraftsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_inboxes/%1$s/messages/%2$s/drafts', $inboxID, $messageID],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: EmailDraftResponse::class,
        );
    }
}
