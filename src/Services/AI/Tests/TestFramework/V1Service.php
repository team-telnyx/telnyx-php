<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework;

use Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1Contract;
use Telnyx\Services\AI\Tests\TestFramework\V1\AiagentsService;
use Telnyx\Services\AI\Tests\TestFramework\V1\MetricsService;
use Telnyx\Services\AI\Tests\TestFramework\V1\ResultsService;
use Telnyx\Services\AI\Tests\TestFramework\V1\ScenariosService;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class V1Service implements V1Contract
{
    /**
     * @api
     */
    public V1RawService $raw;

    /**
     * @api
     */
    public AiagentsService $aiagents;

    /**
     * @api
     */
    public MetricsService $metrics;

    /**
     * @api
     */
    public ResultsService $results;

    /**
     * @api
     */
    public ScenariosService $scenarios;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new V1RawService($client);
        $this->aiagents = new AiagentsService($client);
        $this->metrics = new MetricsService($client);
        $this->results = new ResultsService($client);
        $this->scenarios = new ScenariosService($client);
    }

    /**
     * @api
     *
     * Returns the catalogue of test personalities available to your organization. A personality describes how a simulated caller speaks: prompt, language, accent, voice, interruption level, and call-behaviour settings.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return list<V1GetPersonalitiesResponseItem>
     *
     * @throws APIException
     */
    public function retrievePersonalities(
        RequestOptions|array|null $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrievePersonalities(requestOptions: $requestOptions);

        return $response->parse();
    }
}
