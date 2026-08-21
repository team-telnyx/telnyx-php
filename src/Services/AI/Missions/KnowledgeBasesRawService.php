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
     * @param string $missionID unique identifier of the mission
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
     * Detaches the specified knowledge base from the mission so its content is no longer available to agents in subsequent runs.
     *
     * @param string $knowledgeBaseID unique identifier of the knowledge base
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
     * Returns the details of a single knowledge base attached to the specified mission.
     *
     * @param string $knowledgeBaseID unique identifier of the knowledge base
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
     * Returns the knowledge bases attached to the specified mission. Knowledge bases provide reference content agents can draw on during runs.
     *
     * @param string $missionID unique identifier of the mission
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
     * Replaces the definition of the specified knowledge base on this mission.
     *
     * @param string $knowledgeBaseID unique identifier of the knowledge base
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
