<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BotChallenge\BotChallengeNewResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BotChallengeContract;

/**
 * Agentic (bot) signup for Telnyx accounts. An AI agent solves a reverse-CAPTCHA challenge designed to be easy for LLMs and hard for humans, registers an account, and signs in by consuming a magic link emailed to the account owner. All endpoints are public and unauthenticated; signup endpoints are additionally gated by the freemium feature flags and per-country availability.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BotChallengeService implements BotChallengeContract
{
    /**
     * @api
     */
    public BotChallengeRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BotChallengeRawService($client);
    }

    /**
     * @api
     *
     * Generates a reverse-CAPTCHA challenge used to gate the bot signup flow. A random active problem is selected from the pool; math problems are returned obfuscated (case randomization, symbol injection, spacing noise) with an unobfuscated rounding instruction appended, while string and binary problems are returned as-is. The response contains a single-use nonce, the problem text, and the current terms-and-conditions and privacy-policy URLs, which must be echoed back on the signup request. Challenges expire after a short window (10 minutes by default) and can only be answered once. This endpoint is public and unauthenticated.
     *
     * @param string $llmModelName name of the LLM the client is using
     * @param string $llmParameterCount parameter count of the client LLM
     * @param string $llmQuantization quantization of the client LLM
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $llmModelName = null,
        ?string $llmParameterCount = null,
        ?string $llmQuantization = null,
        RequestOptions|array|null $requestOptions = null,
    ): BotChallengeNewResponse {
        $params = array_filter(
            [
                'llmModelName' => $llmModelName ?? Omitted::VALUE,
                'llmParameterCount' => $llmParameterCount ?? Omitted::VALUE,
                'llmQuantization' => $llmQuantization ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
