<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\BotChallenge\BotChallengeCreateParams;
use Telnyx\BotChallenge\BotChallengeNewResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BotChallengeRawContract;

/**
 * Agentic (bot) signup for Telnyx accounts. An AI agent solves a reverse-CAPTCHA challenge designed to be easy for LLMs and hard for humans, registers an account, and signs in by consuming a magic link emailed to the account owner. All endpoints are public and unauthenticated; signup endpoints are additionally gated by the freemium feature flags and per-country availability.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BotChallengeRawService implements BotChallengeRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Generates a reverse-CAPTCHA challenge used to gate the bot signup flow. A random active problem is selected from the pool; math problems are returned obfuscated (case randomization, symbol injection, spacing noise) with an unobfuscated rounding instruction appended, while string and binary problems are returned as-is. The response contains a single-use nonce, the problem text, and the current terms-and-conditions and privacy-policy URLs, which must be echoed back on the signup request. Challenges expire after a short window (10 minutes by default) and can only be answered once. This endpoint is public and unauthenticated.
     *
     * @param array{
     *   llmModelName?: string, llmParameterCount?: string, llmQuantization?: string
     * }|BotChallengeCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BotChallengeNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|BotChallengeCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BotChallengeCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/bot_challenge',
            body: (object) $parsed,
            options: $options,
            convert: BotChallengeNewResponse::class,
        );
    }
}
