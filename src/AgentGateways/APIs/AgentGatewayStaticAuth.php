<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs;

use Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth\Type;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * A static credential the gateway sends on every request. Write-only: responses show its `type` only.
 *
 * @phpstan-type AgentGatewayStaticAuthShape = array{
 *   type: Type|value-of<Type>, value: string, header?: string|null
 * }
 */
final class AgentGatewayStaticAuth implements BaseModel
{
    /** @use SdkModel<AgentGatewayStaticAuthShape> */
    use SdkModel;

    /**
     * How the credential is sent: `api_key` as `X-API-Key: <value>`, `bearer_token` as `Authorization: Bearer <value>`, `basic` as `Authorization: Basic <base64 of value>` with `value` in the form `user:password`, `token` as `Authorization: token <value>`, and `authorization` as `Authorization: <value>`.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The credential.
     */
    #[Required]
    public string $value;

    /**
     * A header name that replaces `X-API-Key` or `Authorization`.
     */
    #[Optional(nullable: true)]
    public ?string $header;

    /**
     * `new AgentGatewayStaticAuth()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayStaticAuth::with(type: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayStaticAuth)->withType(...)->withValue(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Type|string $type,
        string $value,
        string|Omitted|null $header = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['type'] = $type;
        $self['value'] = $value;

        Omitted::VALUE !== $header && $self['header'] = $header;

        return $self;
    }

    /**
     * How the credential is sent: `api_key` as `X-API-Key: <value>`, `bearer_token` as `Authorization: Bearer <value>`, `basic` as `Authorization: Basic <base64 of value>` with `value` in the form `user:password`, `token` as `Authorization: token <value>`, and `authorization` as `Authorization: <value>`.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The credential.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }

    /**
     * A header name that replaces `X-API-Key` or `Authorization`.
     */
    public function withHeader(?string $header): self
    {
        $self = clone $this;
        $self['header'] = $header;

        return $self;
    }
}
