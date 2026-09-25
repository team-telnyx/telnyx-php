<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Typesafe;

use Telnyx\AI\Typesafe\V1\V1SystemoneParams;
use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Model;
use Telnyx\AI\Typesafe\V1\V1SystemoneResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Typesafe\V1RawContract;

/**
 * Beta API for evaluating shared context with typed questions and structured answers using Flash or Pro.
 *
 * @phpstan-import-type QuestionShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question
 * @phpstan-import-type StateShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\State
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class V1RawService implements V1RawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * **Beta API.** Choose telnyx/decision-flash for the lowest cost and latency, or telnyx/decision-pro for decisions that require long context, including inputs beyond Jev’s 32k per-decision limit. Omitted model defaults to telnyx/decision-flash.
     *
     * Evaluate shared context using named choice, noul (yes/no), and score questions. Returns TypeSafe System One-compatible answer shapes, the selected public model alias, and token usage. See the [decision model guide](https://developers.telnyx.com/docs/inference/decision-models) for examples and compatibility limits.
     *
     * The supported request subset requires instructions for every question, string descriptions for criteria (or null for choice descriptions), 1–64 questions, and 2–64 options for choice and score questions. The model field accepts only telnyx/decision-flash or telnyx/decision-pro. Unsupported model values and unknown fields are rejected. The endpoint is synchronous and does not stream.
     *
     * Use the TypeSafe Python SDK with base_url set to https://api.telnyx.com/v2/ai/typesafe and a Telnyx API key. The SDK appends /v1/systemone; explicitly set model to a supported Telnyx alias because its own default model is not supported. Compatibility covers this operation and the documented request subset; it does not include TypeSafe model listing. Scores describe relative preference, not calibrated correctness.
     *
     * @param array{
     *   questions: array<string,QuestionShape>,
     *   state: StateShape,
     *   model?: Model|value-of<Model>,
     * }|V1SystemoneParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<V1SystemoneResponse>
     *
     * @throws APIException
     */
    public function systemone(
        array|V1SystemoneParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = V1SystemoneParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/typesafe/v1/systemone',
            body: (object) $parsed,
            options: $options,
            convert: V1SystemoneResponse::class,
        );
    }
}
