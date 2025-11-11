<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Assistants\AssistantChatParams;
use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantCreateParams;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantImportParams;
use Telnyx\AI\Assistants\AssistantRetrieveParams;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\AssistantUpdateParams;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface AssistantsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AssistantCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AssistantCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @param array<mixed>|AssistantRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        array|AssistantRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @param array<mixed>|AssistantUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array|AssistantUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AssistantsList;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantDeleteResponse;

    /**
     * @api
     *
     * @param array<mixed>|AssistantChatParams $params
     *
     * @throws APIException
     */
    public function chat(
        string $assistantID,
        array|AssistantChatParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssistantChatResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function clone(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): InferenceEmbedding;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getTexml(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|AssistantImportParams $params
     *
     * @throws APIException
     */
    public function import(
        array|AssistantImportParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssistantsList;
}
