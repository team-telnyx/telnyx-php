<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroup\Guardrails;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup\Guardrails\Secrets\Prompt;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup\Guardrails\Secrets\Response;

/**
 * @phpstan-type SecretsShape = array{
 *   prompt?: null|Prompt|value-of<Prompt>,
 *   response?: null|Response|value-of<Response>,
 * }
 */
final class Secrets implements BaseModel
{
    /** @use SdkModel<SecretsShape> */
    use SdkModel;

    /** @var value-of<Prompt>|null $prompt */
    #[Optional(enum: Prompt::class)]
    public ?string $prompt;

    /** @var value-of<Response>|null $response */
    #[Optional(enum: Response::class)]
    public ?string $response;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Prompt|value-of<Prompt>|null $prompt
     * @param Response|value-of<Response>|null $response
     */
    public static function with(
        Prompt|string|null $prompt = null,
        Response|string|null $response = null
    ): self {
        $self = new self;

        null !== $prompt && $self['prompt'] = $prompt;
        null !== $response && $self['response'] = $response;

        return $self;
    }

    /**
     * @param Prompt|value-of<Prompt> $prompt
     */
    public function withPrompt(Prompt|string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }

    /**
     * @param Response|value-of<Response> $response
     */
    public function withResponse(Response|string $response): self
    {
        $self = clone $this;
        $self['response'] = $response;

        return $self;
    }
}
