<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\TestAgent;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AiagentsContract
{
    /**
     * @api
     *
     * @param string $agentName name of the test agent
     * @param string $assistantID ID of the Telnyx AI assistant under test
     * @param string $language ISO language code the test agent converses in
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $agentName,
        string $assistantID,
        ?bool $autoFetchCallsEnabled = null,
        ?bool $autoSyncPromptEnabled = null,
        ?bool $autoUpdateDropoffNodes = null,
        ?bool $autoUpdateTopicNodes = null,
        ?string $contactNumber = null,
        ?string $description = null,
        ?bool $inbound = null,
        ?string $language = null,
        ?int $llmMaxTokens = null,
        ?string $llmModel = null,
        ?string $llmSystemPrompt = null,
        ?float $llmTemperature = null,
        ?bool $outboundAutoCall = null,
        ?string $sipEndpoint = null,
        RequestOptions|array|null $requestOptions = null,
    ): TestAgent;

    /**
     * @api
     *
     * @param int $id numeric ID of the test agent
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): TestAgent;

    /**
     * @api
     *
     * @param int $id numeric ID of the test agent
     * @param string $agentName name of the test agent
     * @param string $assistantID ID of the Telnyx AI assistant under test
     * @param string $language ISO language code the test agent converses in
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $id,
        ?string $agentName = null,
        ?string $assistantID = null,
        ?bool $autoFetchCallsEnabled = null,
        ?bool $autoSyncPromptEnabled = null,
        ?bool $autoUpdateDropoffNodes = null,
        ?bool $autoUpdateTopicNodes = null,
        ?string $contactNumber = null,
        ?string $description = null,
        ?bool $inbound = null,
        ?string $language = null,
        ?int $llmMaxTokens = null,
        ?string $llmModel = null,
        ?string $llmSystemPrompt = null,
        ?float $llmTemperature = null,
        ?bool $outboundAutoCall = null,
        ?string $sipEndpoint = null,
        RequestOptions|array|null $requestOptions = null,
    ): TestAgent;

    /**
     * @api
     *
     * @param int $page page number (1-based)
     * @param int $pageSize number of results per page
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        int $page = 1,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): AiagentListResponse;

    /**
     * @api
     *
     * @param int $id numeric ID of the test agent
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
