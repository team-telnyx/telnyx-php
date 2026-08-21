<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailInboxes\Drafts\EmailMessage;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\EmailMessages\EmailMessageBatchParams;
use Telnyx\EmailMessages\EmailMessageBatchResponse;
use Telnyx\EmailMessages\EmailMessageCreateParams;
use Telnyx\EmailMessages\EmailMessageDeleteAllParams;
use Telnyx\EmailMessages\EmailMessageGetResponse;
use Telnyx\EmailMessages\EmailMessageListParams;
use Telnyx\EmailMessages\EmailMessageRetrieveEventsParams;
use Telnyx\EmailMessages\MessageEvent;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailMessagesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EmailMessageCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailMessageCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailMessageListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailCursorPagination<EmailMessage>>
     *
     * @throws APIException
     */
    public function list(
        array|EmailMessageListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailMessageBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailMessageBatchResponse>
     *
     * @throws APIException
     */
    public function batch(
        array|EmailMessageBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EmailMessageDeleteAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteAll(
        array|EmailMessageDeleteAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $emailID email message UUID
     * @param array<string,mixed>|EmailMessageRetrieveEventsParams $params
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
    ): BaseResponse;
}
