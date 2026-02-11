<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\AI\Missions\KnowledgeBases\KnowledgeBaseDeleteKnowledgeBaseParams;
use Telnyx\AI\Missions\KnowledgeBases\KnowledgeBaseGetKnowledgeBaseParams;
use Telnyx\AI\Missions\KnowledgeBases\KnowledgeBaseUpdateKnowledgeBaseParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\KnowledgeBasesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class KnowledgeBasesRawService implements KnowledgeBasesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new knowledge base for a mission
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/knowledge-bases', $missionID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Delete a knowledge base from a mission
     *
     * @param array{missionID: string}|KnowledgeBaseDeleteKnowledgeBaseParams $params
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
    ): BaseResponse {
        [$parsed, $options] = KnowledgeBaseDeleteKnowledgeBaseParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'ai/missions/%1$s/knowledge-bases/%2$s', $missionID, $knowledgeBaseID,
            ],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Get a specific knowledge base by ID
     *
     * @param array{missionID: string}|KnowledgeBaseGetKnowledgeBaseParams $params
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
    ): BaseResponse {
        [$parsed, $options] = KnowledgeBaseGetKnowledgeBaseParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'ai/missions/%1$s/knowledge-bases/%2$s', $missionID, $knowledgeBaseID,
            ],
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * List all knowledge bases for a mission
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/knowledge-bases', $missionID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Update a knowledge base definition
     *
     * @param array{missionID: string}|KnowledgeBaseUpdateKnowledgeBaseParams $params
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
    ): BaseResponse {
        [$parsed, $options] = KnowledgeBaseUpdateKnowledgeBaseParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'ai/missions/%1$s/knowledge-bases/%2$s', $missionID, $knowledgeBaseID,
            ],
            options: $options,
            convert: 'mixed',
        );
    }
}
