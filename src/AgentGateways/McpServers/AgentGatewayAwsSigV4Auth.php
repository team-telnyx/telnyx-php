<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\McpServers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * The gateway signs each request with AWS Signature Version 4. Without keys or a role, it uses the instance's own AWS identity. Keys are write-only.
 *
 * @phpstan-type AgentGatewayAwsSigV4AuthShape = array{
 *   region: string,
 *   type: 'aws_sigv4',
 *   accessKeyID?: string|null,
 *   roleName?: string|null,
 *   secretAccessKey?: string|null,
 *   service?: string|null,
 *   sessionToken?: string|null,
 * }
 */
final class AgentGatewayAwsSigV4Auth implements BaseModel
{
    /** @use SdkModel<AgentGatewayAwsSigV4AuthShape> */
    use SdkModel;

    /** @var 'aws_sigv4' $type */
    #[Required]
    public string $type = 'aws_sigv4';

    /**
     * The AWS region to sign for.
     */
    #[Required]
    public string $region;

    #[Optional('access_key_id', nullable: true)]
    public ?string $accessKeyID;

    /**
     * The ARN of a role for the gateway to assume.
     */
    #[Optional('role_name', nullable: true)]
    public ?string $roleName;

    #[Optional('secret_access_key', nullable: true)]
    public ?string $secretAccessKey;

    /**
     * The AWS service to sign for.
     */
    #[Optional]
    public ?string $service;

    #[Optional('session_token', nullable: true)]
    public ?string $sessionToken;

    /**
     * `new AgentGatewayAwsSigV4Auth()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgentGatewayAwsSigV4Auth::with(region: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgentGatewayAwsSigV4Auth)->withRegion(...)
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
     */
    public static function with(
        string $region,
        string|Omitted|null $accessKeyID = Omitted::VALUE,
        string|Omitted|null $roleName = Omitted::VALUE,
        string|Omitted|null $secretAccessKey = Omitted::VALUE,
        string|Omitted|null $sessionToken = Omitted::VALUE,
        ?string $service = null,
    ): self {
        $self = new self;

        $self['region'] = $region;

        Omitted::VALUE !== $accessKeyID && $self['accessKeyID'] = $accessKeyID;
        Omitted::VALUE !== $roleName && $self['roleName'] = $roleName;
        Omitted::VALUE !== $secretAccessKey && $self['secretAccessKey'] = $secretAccessKey;
        null !== $service && $self['service'] = $service;
        Omitted::VALUE !== $sessionToken && $self['sessionToken'] = $sessionToken;

        return $self;
    }

    /**
     * The AWS region to sign for.
     */
    public function withRegion(string $region): self
    {
        $self = clone $this;
        $self['region'] = $region;

        return $self;
    }

    /**
     * @param 'aws_sigv4' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withAccessKeyID(?string $accessKeyID): self
    {
        $self = clone $this;
        $self['accessKeyID'] = $accessKeyID;

        return $self;
    }

    /**
     * The ARN of a role for the gateway to assume.
     */
    public function withRoleName(?string $roleName): self
    {
        $self = clone $this;
        $self['roleName'] = $roleName;

        return $self;
    }

    public function withSecretAccessKey(?string $secretAccessKey): self
    {
        $self = clone $this;
        $self['secretAccessKey'] = $secretAccessKey;

        return $self;
    }

    /**
     * The AWS service to sign for.
     */
    public function withService(string $service): self
    {
        $self = clone $this;
        $self['service'] = $service;

        return $self;
    }

    public function withSessionToken(?string $sessionToken): self
    {
        $self = clone $this;
        $self['sessionToken'] = $sessionToken;

        return $self;
    }
}
