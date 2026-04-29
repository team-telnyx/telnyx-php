<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding;

use Telnyx\AI\Assistants\InferenceEmbedding\ExternalLlm\AuthenticationMethod;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLlmShape = array{
 *   baseURL: string,
 *   model: string,
 *   authenticationMethod?: null|AuthenticationMethod|value-of<AuthenticationMethod>,
 *   certificateRef?: string|null,
 *   forwardMetadata?: bool|null,
 *   llmAPIKeyRef?: string|null,
 *   tokenRetrievalURL?: string|null,
 * }
 */
final class ExternalLlm implements BaseModel
{
    /** @use SdkModel<ExternalLlmShape> */
    use SdkModel;

    /**
     * Base URL for the external LLM endpoint.
     */
    #[Required('base_url')]
    public string $baseURL;

    /**
     * Model identifier to use with the external LLM endpoint.
     */
    #[Required]
    public string $model;

    /**
     * Authentication method used when connecting to the external LLM endpoint.
     *
     * @var value-of<AuthenticationMethod>|null $authenticationMethod
     */
    #[Optional('authentication_method', enum: AuthenticationMethod::class)]
    public ?string $authenticationMethod;

    /**
     * Integration secret identifier for the client certificate used with certificate authentication.
     */
    #[Optional('certificate_ref')]
    public ?string $certificateRef;

    /**
     * When enabled, Telnyx forwards the assistant's dynamic variables to the external LLM endpoint. Defaults to false. The chat completion request includes a top-level `extra_metadata` object when dynamic variables are available. For example: `{"extra_metadata":{"customer_name":"Jane","account_id":"acct_789","telnyx_agent_target":"+13125550100","telnyx_end_user_target":"+13125550123"}}`.
     */
    #[Optional('forward_metadata')]
    public ?bool $forwardMetadata;

    /**
     * Integration secret identifier for the external LLM API key.
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    /**
     * URL used to retrieve an access token when certificate authentication is enabled.
     */
    #[Optional('token_retrieval_url')]
    public ?string $tokenRetrievalURL;

    /**
     * `new ExternalLlm()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLlm::with(baseURL: ..., model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLlm)->withBaseURL(...)->withModel(...)
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
     * @param AuthenticationMethod|value-of<AuthenticationMethod>|null $authenticationMethod
     */
    public static function with(
        string $baseURL,
        string $model,
        AuthenticationMethod|string|null $authenticationMethod = null,
        ?string $certificateRef = null,
        ?bool $forwardMetadata = null,
        ?string $llmAPIKeyRef = null,
        ?string $tokenRetrievalURL = null,
    ): self {
        $self = new self;

        $self['baseURL'] = $baseURL;
        $self['model'] = $model;

        null !== $authenticationMethod && $self['authenticationMethod'] = $authenticationMethod;
        null !== $certificateRef && $self['certificateRef'] = $certificateRef;
        null !== $forwardMetadata && $self['forwardMetadata'] = $forwardMetadata;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $tokenRetrievalURL && $self['tokenRetrievalURL'] = $tokenRetrievalURL;

        return $self;
    }

    /**
     * Base URL for the external LLM endpoint.
     */
    public function withBaseURL(string $baseURL): self
    {
        $self = clone $this;
        $self['baseURL'] = $baseURL;

        return $self;
    }

    /**
     * Model identifier to use with the external LLM endpoint.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Authentication method used when connecting to the external LLM endpoint.
     *
     * @param AuthenticationMethod|value-of<AuthenticationMethod> $authenticationMethod
     */
    public function withAuthenticationMethod(
        AuthenticationMethod|string $authenticationMethod
    ): self {
        $self = clone $this;
        $self['authenticationMethod'] = $authenticationMethod;

        return $self;
    }

    /**
     * Integration secret identifier for the client certificate used with certificate authentication.
     */
    public function withCertificateRef(string $certificateRef): self
    {
        $self = clone $this;
        $self['certificateRef'] = $certificateRef;

        return $self;
    }

    /**
     * When enabled, Telnyx forwards the assistant's dynamic variables to the external LLM endpoint. Defaults to false. The chat completion request includes a top-level `extra_metadata` object when dynamic variables are available. For example: `{"extra_metadata":{"customer_name":"Jane","account_id":"acct_789","telnyx_agent_target":"+13125550100","telnyx_end_user_target":"+13125550123"}}`.
     */
    public function withForwardMetadata(bool $forwardMetadata): self
    {
        $self = clone $this;
        $self['forwardMetadata'] = $forwardMetadata;

        return $self;
    }

    /**
     * Integration secret identifier for the external LLM API key.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $self = clone $this;
        $self['llmAPIKeyRef'] = $llmAPIKeyRef;

        return $self;
    }

    /**
     * URL used to retrieve an access token when certificate authentication is enabled.
     */
    public function withTokenRetrievalURL(string $tokenRetrievalURL): self
    {
        $self = clone $this;
        $self['tokenRetrievalURL'] = $tokenRetrievalURL;

        return $self;
    }
}
