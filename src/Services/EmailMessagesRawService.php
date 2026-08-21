<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailInboxes\Drafts\EmailMessage;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\EmailMessages\AttachmentRequest;
use Telnyx\EmailMessages\EmailMessageBatchParams;
use Telnyx\EmailMessages\EmailMessageBatchParams\Message;
use Telnyx\EmailMessages\EmailMessageBatchResponse;
use Telnyx\EmailMessages\EmailMessageCreateParams;
use Telnyx\EmailMessages\EmailMessageDeleteAllParams;
use Telnyx\EmailMessages\EmailMessageGetResponse;
use Telnyx\EmailMessages\EmailMessageListParams;
use Telnyx\EmailMessages\EmailMessageRetrieveEventsParams;
use Telnyx\EmailMessages\MessageEvent;
use Telnyx\EmailMessages\TrackingSettings;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailMessagesRawContract;

/**
 * Send and manage email messages. Legacy `/v2/emails` routes are aliases for these endpoints.
 *
 * @phpstan-import-type AttachmentRequestShape from \Telnyx\EmailMessages\AttachmentRequest
 * @phpstan-import-type TrackingSettingsShape from \Telnyx\EmailMessages\TrackingSettings
 * @phpstan-import-type MessageShape from \Telnyx\EmailMessages\EmailMessageBatchParams\Message
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailMessagesRawService implements EmailMessagesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Queues, schedules, or sandbox-sends an email message. The legacy `/v2/emails` POST route
     * is a backward-compatible alias for this operation.
     *
     * `subject` is required unless `template_id` is supplied. When using `template_id`, do not
     * also provide `subject`, `html_body`, or `text_body`; the template is rendered with
     * `template_variables`.
     *
     * Note: template lookup failures (not found, wrong account) return 400, not 404.
     *
     * @param array{
     *   from: EmailAddressInputShape,
     *   to: list<EmailAddressInputShape>,
     *   attachments?: list<AttachmentRequest|AttachmentRequestShape>,
     *   bcc?: list<EmailAddressInputShape>,
     *   cc?: list<EmailAddressInputShape>,
     *   forwardOfMessageID?: string|null,
     *   fromName?: string,
     *   groupID?: string|null,
     *   headers?: array<string,string>,
     *   htmlBody?: string,
     *   ignoreSuppression?: bool,
     *   inReplyToMessageID?: string|null,
     *   inlineCss?: bool,
     *   metadata?: array<string,mixed>,
     *   replyTo?: EmailAddressInputShape,
     *   replyToAll?: bool|null,
     *   sandboxMode?: bool,
     *   scheduledAt?: \DateTimeInterface|null,
     *   sendAt?: \DateTimeInterface,
     *   subject?: string,
     *   tags?: list<string>,
     *   templateID?: string,
     *   templateVariables?: array<string,mixed>,
     *   textBody?: string,
     *   trackingSettings?: TrackingSettings|TrackingSettingsShape,
     *   idempotencyKey?: string,
     * }|EmailMessageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailMessageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailMessageCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_messages',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: EmailMessageResponse::class,
        );
    }

    /**
     * @api
     *
     * The legacy `/v2/emails/{id}` GET route is a backward-compatible alias for this operation.
     *
     * @param string $id email message UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_messages/%1$s', $id],
            options: $requestOptions,
            convert: EmailMessageGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists messages sorted newest first by `created_at desc, id desc`. No filters other than
     * cursor pagination are implemented. The legacy `/v2/emails` GET route is a backward-compatible
     * alias for this operation.
     *
     * @param array{pageCursor?: string, pageSize?: int}|EmailMessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailCursorPagination<EmailMessage>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailMessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailMessageListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_messages',
            query: Util::array_transform_keys(
                $parsed,
                ['pageCursor' => 'page_cursor', 'pageSize' => 'page_size']
            ),
            options: $options,
            convert: EmailMessage::class,
            page: EmailCursorPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes an account-scoped email message, its events, its durable
     * recipients, and unshared attachment objects. Returns 404 when the message does
     * not exist in the authenticated account. The legacy `/v2/emails/{id}` DELETE
     * route is a backward-compatible alias.
     *
     * @param string $id email message UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_messages/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Creates up to 50 email messages in a single request.
     *
     * @param array{
     *   messages: list<Message|MessageShape>,
     *   sandboxMode?: bool,
     *   idempotencyKey?: string,
     * }|EmailMessageBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageBatchResponse>
     *
     * @throws APIException
     */
    public function batch(
        array|EmailMessageBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailMessageBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_messages/batch',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: EmailMessageBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes every email in the authenticated account sent from or to the
     * supplied address, including retained events whose parent message has expired.
     * Events and durable recipients are deleted immediately with each message. The
     * operation never searches or reports matches in another account. The legacy
     * `/v2/emails` DELETE route is a backward-compatible alias.
     *
     * @param array{address: string}|EmailMessageDeleteAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAll(
        array|EmailMessageDeleteAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailMessageDeleteAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: 'email_messages',
            query: $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Cancels a scheduled email and returns it with status `cancelled`. The legacy `/v2/emails/{id}/schedule` DELETE route is an alias.
     *
     * @param string $emailID email message UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageResponse>
     *
     * @throws APIException
     */
    public function deleteSchedule(
        string $emailID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_messages/%1$s/schedule', $emailID],
            options: $requestOptions,
            convert: EmailMessageResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists events for a single message sorted oldest first by `occurred_at asc, id asc`.
     * The legacy `/v2/emails/{id}/events` GET route is a backward-compatible alias.
     *
     * @param string $emailID email message UUID
     * @param array{
     *   pageCursor?: string, pageSize?: int
     * }|EmailMessageRetrieveEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailCursorPagination<MessageEvent>>
     *
     * @throws APIException
     */
    public function retrieveEvents(
        string $emailID,
        array|EmailMessageRetrieveEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailMessageRetrieveEventsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_messages/%1$s/events', $emailID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageCursor' => 'page_cursor', 'pageSize' => 'page_size']
            ),
            options: $options,
            convert: MessageEvent::class,
            page: EmailCursorPagination::class,
        );
    }
}
