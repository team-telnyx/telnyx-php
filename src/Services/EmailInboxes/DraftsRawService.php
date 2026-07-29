<?php

declare(strict_types=1);

namespace Telnyx\Services\EmailInboxes;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailInboxes\Drafts\DraftCreateParams;
use Telnyx\EmailInboxes\Drafts\DraftDeleteParams;
use Telnyx\EmailInboxes\Drafts\DraftListParams;
use Telnyx\EmailInboxes\Drafts\DraftListParams\FilterStatus;
use Telnyx\EmailInboxes\Drafts\DraftListResponse;
use Telnyx\EmailInboxes\Drafts\DraftRetrieveParams;
use Telnyx\EmailInboxes\Drafts\DraftSendParams;
use Telnyx\EmailInboxes\Drafts\DraftUpdateParams;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailInboxes\DraftsRawContract;

/**
 * Create, list, retrieve, update, delete, and send unsent draft messages belonging to an agent inbox.
 *
 * @phpstan-import-type EmailAddressInputShape from \Telnyx\EmailMessages\EmailAddressInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DraftsRawService implements DraftsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an unsent draft in the inbox. Every field is optional — a draft is a
     * work-in-progress and may be saved incomplete. Send-time requirements (sender,
     * subject, at least one recipient) are enforced when the draft is sent, not when
     * it is created.
     *
     * Drafts are unbillable and emit no Email Detail Records until they are sent.
     *
     * @param string $inboxID email inbox UUID
     * @param array{
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
     * }|DraftCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDraftResponse>
     *
     * @throws APIException
     */
    public function create(
        string $inboxID,
        array|DraftCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DraftCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_inboxes/%1$s/drafts', $inboxID],
            body: (object) $parsed,
            options: $options,
            convert: EmailDraftResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a single draft. Drafts that have been sent remain retrievable, so the
     * exact content that was sent stays auditable.
     *
     * @param string $draftID email draft UUID
     * @param array{inboxID: string}|DraftRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDraftResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $draftID,
        array|DraftRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DraftRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_inboxes/%1$s/drafts/%2$s', $inboxID, $draftID],
            options: $options,
            convert: EmailDraftResponse::class,
        );
    }

    /**
     * @api
     *
     * Identical to `PUT`; both apply a partial update to the supplied fields.
     *
     * @param string $draftID path param: Email draft UUID
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
     * }|DraftUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDraftResponse>
     *
     * @throws APIException
     */
    public function update(
        string $draftID,
        array|DraftUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DraftUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['email_inboxes/%1$s/drafts/%2$s', $inboxID, $draftID],
            body: (object) array_diff_key($parsed, array_flip(['inboxID'])),
            options: $options,
            convert: EmailDraftResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists drafts newest first using stable cursor pagination. All access is scoped
     * to the authenticated account and the given inbox.
     *
     * @param string $inboxID email inbox UUID
     * @param array{
     *   filterStatus?: FilterStatus|value-of<FilterStatus>,
     *   pageAfter?: string,
     *   pageSize?: int,
     * }|DraftListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DraftListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $inboxID,
        array|DraftListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DraftListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['email_inboxes/%1$s/drafts', $inboxID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterStatus' => 'filter[status]',
                    'pageAfter' => 'page[after]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: DraftListResponse::class,
        );
    }

    /**
     * @api
     *
     * Permanently deletes an unsent draft. Drafts that are being sent or have been sent
     * cannot be deleted; sent drafts are retained for audit.
     *
     * @param string $draftID email draft UUID
     * @param array{inboxID: string}|DraftDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $draftID,
        array|DraftDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DraftDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['email_inboxes/%1$s/drafts/%2$s', $inboxID, $draftID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Sends the draft through the standard send pipeline — the same domain resolution,
     * suppression, reputation, daily-quota, persistence and Detail Record behaviour as
     * `POST /v2/email_messages`. The response body is the created email message.
     *
     * If the draft has no explicit `from_email`, the inbox address is used.
     *
     * The draft is marked `sent` only after the send is accepted; a send rejected for
     * suppression, quota or reputation leaves the draft editable so it can be fixed and
     * retried. A draft that is already `sent` returns 422 rather than sending twice.
     *
     * @param string $draftID email draft UUID
     * @param array{inboxID: string}|DraftSendParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageResponse>
     *
     * @throws APIException
     */
    public function send(
        string $draftID,
        array|DraftSendParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DraftSendParams::parseRequest(
            $params,
            $requestOptions,
        );
        $inboxID = $parsed['inboxID'];
        unset($parsed['inboxID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_inboxes/%1$s/drafts/%2$s/send', $inboxID, $draftID],
            options: $options,
            convert: EmailMessageResponse::class,
        );
    }
}
