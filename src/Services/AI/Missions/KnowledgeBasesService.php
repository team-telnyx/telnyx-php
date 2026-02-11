<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\KnowledgeBasesContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class KnowledgeBasesService implements KnowledgeBasesContract
{
    /**
     * @api
     */
    public KnowledgeBasesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new KnowledgeBasesRawService($client);
    }

    /**
     * @api
     *
     * Create a new knowledge base for a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createKnowledgeBase(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createKnowledgeBase($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a knowledge base from a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteKnowledgeBase(
        string $knowledgeBaseID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteKnowledgeBase($knowledgeBaseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific knowledge base by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getKnowledgeBase(
        string $knowledgeBaseID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getKnowledgeBase($knowledgeBaseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all knowledge bases for a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listKnowledgeBases(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listKnowledgeBases($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a knowledge base definition
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateKnowledgeBase(
        string $knowledgeBaseID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateKnowledgeBase($knowledgeBaseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
