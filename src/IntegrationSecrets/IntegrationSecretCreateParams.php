<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams\Type;

/**
 * Create a new secret with an associated identifier that can be used to securely integrate with other services.
 *
 * @see Telnyx\Services\IntegrationSecretsService::create()
 *
 * @phpstan-type IntegrationSecretCreateParamsShape = array{
 *   identifier: string,
 *   type: Type|value-of<Type>,
 *   token?: string|null,
 *   password?: string|null,
 *   username?: string|null,
 * }
 */
final class IntegrationSecretCreateParams implements BaseModel
{
    /** @use SdkModel<IntegrationSecretCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the secret.
     */
    #[Required]
    public string $identifier;

    /**
     * The type of secret.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * The token for the secret. Required for bearer type secrets, ignored otherwise.
     */
    #[Optional]
    public ?string $token;

    /**
     * The password for the secret. Required for basic type secrets, ignored otherwise.
     */
    #[Optional]
    public ?string $password;

    /**
     * The username for the secret. Required for basic type secrets, ignored otherwise.
     */
    #[Optional]
    public ?string $username;

    /**
     * `new IntegrationSecretCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegrationSecretCreateParams::with(identifier: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegrationSecretCreateParams)->withIdentifier(...)->withType(...)
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
        string $identifier,
        Type|string $type,
        ?string $token = null,
        ?string $password = null,
        ?string $username = null,
    ): self {
        $self = new self;

        $self['identifier'] = $identifier;
        $self['type'] = $type;

        null !== $token && $self['token'] = $token;
        null !== $password && $self['password'] = $password;
        null !== $username && $self['username'] = $username;

        return $self;
    }

    /**
     * The unique identifier of the secret.
     */
    public function withIdentifier(string $identifier): self
    {
        $self = clone $this;
        $self['identifier'] = $identifier;

        return $self;
    }

    /**
     * The type of secret.
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
     * The token for the secret. Required for bearer type secrets, ignored otherwise.
     */
    public function withToken(string $token): self
    {
        $self = clone $this;
        $self['token'] = $token;

        return $self;
    }

    /**
     * The password for the secret. Required for basic type secrets, ignored otherwise.
     */
    public function withPassword(string $password): self
    {
        $self = clone $this;
        $self['password'] = $password;

        return $self;
    }

    /**
     * The username for the secret. Required for basic type secrets, ignored otherwise.
     */
    public function withUsername(string $username): self
    {
        $self = clone $this;
        $self['username'] = $username;

        return $self;
    }
}
