<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Dlp\Profile;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Dlp\Prompt;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Dlp\Response;

/**
 * @phpstan-type DlpShape = array{
 *   profiles?: list<Profile|value-of<Profile>>|null,
 *   prompt?: null|Prompt|value-of<Prompt>,
 *   response?: null|Response|value-of<Response>,
 * }
 */
final class Dlp implements BaseModel
{
    /** @use SdkModel<DlpShape> */
    use SdkModel;

    /** @var list<value-of<Profile>>|null $profiles */
    #[Optional(list: Profile::class)]
    public ?array $profiles;

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
     * @param list<Profile|value-of<Profile>>|null $profiles
     * @param Prompt|value-of<Prompt>|null $prompt
     * @param Response|value-of<Response>|null $response
     */
    public static function with(
        ?array $profiles = null,
        Prompt|string|null $prompt = null,
        Response|string|null $response = null,
    ): self {
        $self = new self;

        null !== $profiles && $self['profiles'] = $profiles;
        null !== $prompt && $self['prompt'] = $prompt;
        null !== $response && $self['response'] = $response;

        return $self;
    }

    /**
     * @param list<Profile|value-of<Profile>> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $self = clone $this;
        $self['profiles'] = $profiles;

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
