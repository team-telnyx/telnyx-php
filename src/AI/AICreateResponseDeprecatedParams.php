<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * **Deprecated**: Use `POST /v2/ai/openai/responses` instead. This endpoint is compatible with the [OpenAI Responses API](https://developers.openai.com/api/reference/responses/overview) and may be used with the OpenAI JS or Python SDK. Response id parameter is not supported at the moment. Use the `conversation` parameter with a Telnyx Conversation ID to leverage persistent conversations.
 *
 * @deprecated
 * @see Telnyx\Services\AIService::createResponseDeprecated()
 *
 * @phpstan-type AICreateResponseDeprecatedParamsShape = array{
 *   responseRequest: array<string,mixed>
 * }
 */
final class AICreateResponseDeprecatedParams implements BaseModel
{
    /** @use SdkModel<AICreateResponseDeprecatedParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,mixed> $responseRequest */
    #[Required(map: 'mixed')]
    public array $responseRequest;

    /**
     * `new AICreateResponseDeprecatedParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AICreateResponseDeprecatedParams::with(responseRequest: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AICreateResponseDeprecatedParams)->withResponseRequest(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed> $responseRequest
     */
    public static function with(array $responseRequest): self
    {
        $self = new self;

        $self['responseRequest'] = $responseRequest;

        return $self;
    }

    /**
     * @param array<string,mixed> $responseRequest
     */
    public function withResponseRequest(array $responseRequest): self
    {
        $self = clone $this;
        $self['responseRequest'] = $responseRequest;

        return $self;
    }
}
