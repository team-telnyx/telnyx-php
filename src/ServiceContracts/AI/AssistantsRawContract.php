<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Assistants\AssistantChatParams;
use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantCreateParams;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantImportParams;
use Telnyx\AI\Assistants\AssistantRetrieveParams;
use Telnyx\AI\Assistants\AssistantSendSMSParams;
use Telnyx\AI\Assistants\AssistantSendSMSResponse;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\AssistantUpdateParams;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AssistantsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|AssistantCreateParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function create(
        array|AssistantCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AssistantRetrieveParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        array|AssistantRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AssistantUpdateParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array|AssistantUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<AssistantsList>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<AssistantDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AssistantChatParams $params
     *
     * @return BaseResponse<AssistantChatResponse>
     *
     * @throws APIException
     */
    public function chat(
        string $assistantID,
        array|AssistantChatParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function clone(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getTexml(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AssistantImportParams $params
     *
     * @return BaseResponse<AssistantsList>
     *
     * @throws APIException
     */
    public function import(
        array|AssistantImportParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|AssistantSendSMSParams $params
     *
     * @return BaseResponse<AssistantSendSMSResponse>
     *
     * @throws APIException
     */
    public function sendSMS(
        string $assistantID,
        array|AssistantSendSMSParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
