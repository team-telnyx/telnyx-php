<?php

declare(strict_types=1);

namespace Telnyx\Calls\CallAssistantRequest\FallbackConfig;

use Telnyx\Calls\CallAssistantRequest\FallbackConfig\ExternalLlm\AuthenticationMethod;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * External LLM fallback configuration.
 *
 * @phpstan-type ExternalLlmShape = array{
 *   authenticationMethod?: null|AuthenticationMethod|value-of<AuthenticationMethod>,
 *   baseURL?: string|null,
 *   certificateRef?: string|null,
 *   forwardMetadata?: bool|null,
 *   llmAPIKeyRef?: string|null,
 *   model?: string|null,
 *   tokenRetrievalURL?: string|null,
 * }
 */
final class ExternalLlm implements BaseModel
{
    /** @use SdkModel<ExternalLlmShape> */
    use SdkModel;

    /**
     * Authentication method used when connecting to the external LLM endpoint.
     *
     * @var value-of<AuthenticationMethod>|null $authenticationMethod
     */
    #[Optional('authentication_method', enum: AuthenticationMethod::class)]
    public ?string $authenticationMethod;

    /**
     * Base URL for the external LLM endpoint.
     */
    #[Optional('base_url')]
    public ?string $baseURL;

    /**
     * Integration secret identifier for the client certificate used with certificate authentication.
     */
    #[Optional('certificate_ref')]
    public ?string $certificateRef;

    /**
     * When enabled, Telnyx forwards conversation metadata and dynamic variables to the external LLM endpoint. Defaults to false. The external endpoint receives the standard chat completions payload with top-level `metadata` and `dynamic_variables` objects when values are available. For example: `{"metadata":{"conversation_id":"conv_123","assistant_id":"assistant_456","call_control_id":"v3:abc123","telnyx_conversation_channel":"phone_call"},"dynamic_variables":{"customer_name":"Jane","account_id":"acct_789","telnyx_agent_target":"+13125550100","telnyx_end_user_target":"+13125550123"}}`.
     */
    #[Optional('forward_metadata')]
    public ?bool $forwardMetadata;

    /**
     * Integration secret identifier for the external LLM API key.
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    /**
     * Model identifier to use with the external LLM endpoint.
     */
    #[Optional]
    public ?string $model;

    /**
     * URL used to retrieve an access token when certificate authentication is enabled.
     */
    #[Optional('token_retrieval_url')]
    public ?string $tokenRetrievalURL;

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
        AuthenticationMethod|string|null $authenticationMethod = null,
        ?string $baseURL = null,
        ?string $certificateRef = null,
        ?bool $forwardMetadata = null,
        ?string $llmAPIKeyRef = null,
        ?string $model = null,
        ?string $tokenRetrievalURL = null,
    ): self {
        $self = new self;

        null !== $authenticationMethod && $self['authenticationMethod'] = $authenticationMethod;
        null !== $baseURL && $self['baseURL'] = $baseURL;
        null !== $certificateRef && $self['certificateRef'] = $certificateRef;
        null !== $forwardMetadata && $self['forwardMetadata'] = $forwardMetadata;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $model && $self['model'] = $model;
        null !== $tokenRetrievalURL && $self['tokenRetrievalURL'] = $tokenRetrievalURL;

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
     * Base URL for the external LLM endpoint.
     */
    public function withBaseURL(string $baseURL): self
    {
        $self = clone $this;
        $self['baseURL'] = $baseURL;

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
     * When enabled, Telnyx forwards conversation metadata and dynamic variables to the external LLM endpoint. Defaults to false. The external endpoint receives the standard chat completions payload with top-level `metadata` and `dynamic_variables` objects when values are available. For example: `{"metadata":{"conversation_id":"conv_123","assistant_id":"assistant_456","call_control_id":"v3:abc123","telnyx_conversation_channel":"phone_call"},"dynamic_variables":{"customer_name":"Jane","account_id":"acct_789","telnyx_agent_target":"+13125550100","telnyx_end_user_target":"+13125550123"}}`.
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
     * Model identifier to use with the external LLM endpoint.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

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
