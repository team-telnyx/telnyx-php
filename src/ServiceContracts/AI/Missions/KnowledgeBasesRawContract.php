<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions;

use Telnyx\AI\Missions\KnowledgeBases\KnowledgeBaseDeleteKnowledgeBaseParams;
use Telnyx\AI\Missions\KnowledgeBases\KnowledgeBaseGetKnowledgeBaseParams;
use Telnyx\AI\Missions\KnowledgeBases\KnowledgeBaseUpdateKnowledgeBaseParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface KnowledgeBasesRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createKnowledgeBase(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|KnowledgeBaseDeleteKnowledgeBaseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteKnowledgeBase(
        string $knowledgeBaseID,
        array|KnowledgeBaseDeleteKnowledgeBaseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|KnowledgeBaseGetKnowledgeBaseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getKnowledgeBase(
        string $knowledgeBaseID,
        array|KnowledgeBaseGetKnowledgeBaseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listKnowledgeBases(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|KnowledgeBaseUpdateKnowledgeBaseParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateKnowledgeBase(
        string $knowledgeBaseID,
        array|KnowledgeBaseUpdateKnowledgeBaseParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
