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
 * @see Telnyx\Services\AIService::createResponse()
 *
 * @phpstan-type AICreateResponseParamsShape = array{input: array<string,mixed>}
 */
final class AICreateResponseParams implements BaseModel
{
    /** @use SdkModel<AICreateResponseParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var array<string,mixed> $input */
    #[Required(map: 'mixed')]
    public array $input;

    /**
     * `new AICreateResponseParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AICreateResponseParams::with(input: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AICreateResponseParams)->withInput(...)
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
     * @param array<string,mixed> $input
     */
    public static function with(array $input): self
    {
        $self = new self;

        $self['input'] = $input;

        return $self;
    }

    /**
     * @param array<string,mixed> $input
     */
    public function withInput(array $input): self
    {
        $self = clone $this;
        $self['input'] = $input;

        return $self;
    }
}
