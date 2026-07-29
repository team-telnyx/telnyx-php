<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\EmailInboxes;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailInboxes\Drafts\DraftCreateParams;
use Telnyx\EmailInboxes\Drafts\DraftDeleteParams;
use Telnyx\EmailInboxes\Drafts\DraftListParams;
use Telnyx\EmailInboxes\Drafts\DraftListResponse;
use Telnyx\EmailInboxes\Drafts\DraftPatchParams;
use Telnyx\EmailInboxes\Drafts\DraftRetrieveParams;
use Telnyx\EmailInboxes\Drafts\DraftSendParams;
use Telnyx\EmailInboxes\Drafts\DraftUpdateParams;
use Telnyx\EmailInboxes\Drafts\EmailDraftResponse;
use Telnyx\EmailInboxes\Drafts\EmailMessageResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DraftsRawContract
{
    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param array<string,mixed>|DraftCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $draftID email draft UUID
     * @param array<string,mixed>|DraftRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $draftID path param: Email draft UUID
     * @param array<string,mixed>|DraftUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $inboxID email inbox UUID
     * @param array<string,mixed>|DraftListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $draftID email draft UUID
     * @param array<string,mixed>|DraftDeleteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $draftID path param: Email draft UUID
     * @param array<string,mixed>|DraftPatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailDraftResponse>
     *
     * @throws APIException
     */
    public function patch(
        string $draftID,
        array|DraftPatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $draftID email draft UUID
     * @param array<string,mixed>|DraftSendParams $params
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
    ): BaseResponse;
}
