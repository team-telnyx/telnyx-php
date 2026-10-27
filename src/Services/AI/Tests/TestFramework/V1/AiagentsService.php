<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\TestAgent;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1\AiagentsContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AiagentsService implements AiagentsContract
{
    /**
     * @api
     */
    public AiagentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AiagentsRawService($client);
    }

    /**
     * @api
     *
     * Creates a test agent in your organization. The agent wraps a Telnyx AI assistant so simulated callers can be sent against it.
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
    ): TestAgent {
        $params = array_filter(
            [
                'agentName' => $agentName,
                'assistantID' => $assistantID,
                'autoFetchCallsEnabled' => $autoFetchCallsEnabled ?? Omitted::VALUE,
                'autoSyncPromptEnabled' => $autoSyncPromptEnabled ?? Omitted::VALUE,
                'autoUpdateDropoffNodes' => $autoUpdateDropoffNodes ?? Omitted::VALUE,
                'autoUpdateTopicNodes' => $autoUpdateTopicNodes ?? Omitted::VALUE,
                'contactNumber' => $contactNumber ?? Omitted::VALUE,
                'description' => $description ?? Omitted::VALUE,
                'inbound' => $inbound ?? Omitted::VALUE,
                'language' => $language ?? Omitted::VALUE,
                'llmMaxTokens' => $llmMaxTokens ?? Omitted::VALUE,
                'llmModel' => $llmModel ?? Omitted::VALUE,
                'llmSystemPrompt' => $llmSystemPrompt ?? Omitted::VALUE,
                'llmTemperature' => $llmTemperature ?? Omitted::VALUE,
                'outboundAutoCall' => $outboundAutoCall ?? Omitted::VALUE,
                'sipEndpoint' => $sipEndpoint ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the specified test agent.
     *
     * @param int $id numeric ID of the test agent
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): TestAgent {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the specified test agent.
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
    ): TestAgent {
        $params = array_filter(
            [
                'agentName' => $agentName ?? Omitted::VALUE,
                'assistantID' => $assistantID ?? Omitted::VALUE,
                'autoFetchCallsEnabled' => $autoFetchCallsEnabled ?? Omitted::VALUE,
                'autoSyncPromptEnabled' => $autoSyncPromptEnabled ?? Omitted::VALUE,
                'autoUpdateDropoffNodes' => $autoUpdateDropoffNodes ?? Omitted::VALUE,
                'autoUpdateTopicNodes' => $autoUpdateTopicNodes ?? Omitted::VALUE,
                'contactNumber' => $contactNumber ?? Omitted::VALUE,
                'description' => $description ?? Omitted::VALUE,
                'inbound' => $inbound ?? Omitted::VALUE,
                'language' => $language ?? Omitted::VALUE,
                'llmMaxTokens' => $llmMaxTokens ?? Omitted::VALUE,
                'llmModel' => $llmModel ?? Omitted::VALUE,
                'llmSystemPrompt' => $llmSystemPrompt ?? Omitted::VALUE,
                'llmTemperature' => $llmTemperature ?? Omitted::VALUE,
                'outboundAutoCall' => $outboundAutoCall ?? Omitted::VALUE,
                'sipEndpoint' => $sipEndpoint ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of test agents in your organization. A test agent wraps the Telnyx AI assistant under test and drives simulated callers against it.
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
    ): AiagentListResponse {
        $params = ['page' => $page, 'pageSize' => $pageSize];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the specified test agent.
     *
     * @param int $id numeric ID of the test agent
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
