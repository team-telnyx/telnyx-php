<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type ExternalLlmShape = array{
 *   baseURL: string,
 *   model: string,
 *   authenticationMethod?: null|AuthenticationMethod|value-of<AuthenticationMethod>,
 *   certificateRef?: string|null,
 *   extraHeaders?: array<string,string>|null,
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
     * Custom HTTP headers Telnyx sets on every request to the external LLM endpoint, in addition to the authentication header. Keys are header names, values are static strings. At most 32 headers. Reserved names are rejected: accept-encoding, authorization, connection, content-encoding, content-length, content-type, cookie, expect, host, keep-alive, proxy-authenticate, proxy-authorization, proxy-connection, set-cookie, te, trailer, transfer-encoding, upgrade, x-host-rewrite, x-request-id, x-trace-id, and any x-telnyx-* or x-stainless-* header; '_' counts as '-' when names are compared. Names must be valid HTTP header names (RFC 7230 token, at most 128 characters) and must not repeat (case-insensitive). Values must be printable ASCII, at most 4096 characters, with no leading or trailing whitespace. Values are stored as plain text and returned when the assistant is retrieved.
     *
     * @var array<string,string>|null $extraHeaders
     */
    #[Optional('extra_headers', map: 'string', nullable: true)]
    public ?array $extraHeaders;

    /**
     * When `true`, Telnyx forwards the assistant's dynamic variables to the external LLM endpoint as a top-level `extra_metadata` object on the chat completion request body. Defaults to `false`. Example payload sent to the external endpoint: `{"extra_metadata": {"customer_name": "Jane", "account_id": "acct_789", "telnyx_agent_target": "+13125550100", "telnyx_end_user_target": "+13125550123"}}`. Distinct from OpenAI's native `metadata` field, which has its own size and type limits.
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
     * @param Omitted|array<string,string>|null $extraHeaders
     * @param AuthenticationMethod|value-of<AuthenticationMethod>|null $authenticationMethod
     */
    public static function with(
        string $baseURL,
        string $model,
        Omitted|array|null $extraHeaders = Omitted::VALUE,
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
        Omitted::VALUE !== $extraHeaders && $self['extraHeaders'] = $extraHeaders;
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
     * Custom HTTP headers Telnyx sets on every request to the external LLM endpoint, in addition to the authentication header. Keys are header names, values are static strings. At most 32 headers. Reserved names are rejected: accept-encoding, authorization, connection, content-encoding, content-length, content-type, cookie, expect, host, keep-alive, proxy-authenticate, proxy-authorization, proxy-connection, set-cookie, te, trailer, transfer-encoding, upgrade, x-host-rewrite, x-request-id, x-trace-id, and any x-telnyx-* or x-stainless-* header; '_' counts as '-' when names are compared. Names must be valid HTTP header names (RFC 7230 token, at most 128 characters) and must not repeat (case-insensitive). Values must be printable ASCII, at most 4096 characters, with no leading or trailing whitespace. Values are stored as plain text and returned when the assistant is retrieved.
     *
     * @param array<string,string>|null $extraHeaders
     */
    public function withExtraHeaders(?array $extraHeaders): self
    {
        $self = clone $this;
        $self['extraHeaders'] = $extraHeaders;

        return $self;
    }

    /**
     * When `true`, Telnyx forwards the assistant's dynamic variables to the external LLM endpoint as a top-level `extra_metadata` object on the chat completion request body. Defaults to `false`. Example payload sent to the external endpoint: `{"extra_metadata": {"customer_name": "Jane", "account_id": "acct_789", "telnyx_agent_target": "+13125550100", "telnyx_end_user_target": "+13125550123"}}`. Distinct from OpenAI's native `metadata` field, which has its own size and type limits.
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
