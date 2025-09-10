<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\IntegrationSecrets\IntegrationSecretCreateParams\Type;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new IntegrationSecretCreateParams); // set properties as needed
 * $client->integrationSecrets->create(...$params->toArray());
 * ```
 * Create a new secret with an associated identifier that can be used to securely integrate with other services.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->integrationSecrets->create(...$params->toArray());`
 *
 * @see Telnyx\IntegrationSecrets->create
 *
 * @phpstan-type integration_secret_create_params = array{
 *   identifier: string,
 *   type: Type|value-of<Type>,
 *   token?: string,
 *   password?: string,
 *   username?: string,
 * }
 */
final class IntegrationSecretCreateParams implements BaseModel
{
    /** @use SdkModel<integration_secret_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique identifier of the secret.
     */
    #[Api]
    public string $identifier;

    /**
     * The type of secret.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * The token for the secret. Required for bearer type secrets, ignored otherwise.
     */
    #[Api(optional: true)]
    public ?string $token;

    /**
     * The password for the secret. Required for basic type secrets, ignored otherwise.
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * The username for the secret. Required for basic type secrets, ignored otherwise.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->identifier = $identifier;
        $obj->type = $type instanceof Type ? $type->value : $type;

        null !== $token && $obj->token = $token;
        null !== $password && $obj->password = $password;
        null !== $username && $obj->username = $username;

        return $obj;
    }

    /**
     * The unique identifier of the secret.
     */
    public function withIdentifier(string $identifier): self
    {
        $obj = clone $this;
        $obj->identifier = $identifier;

        return $obj;
    }

    /**
     * The type of secret.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * The token for the secret. Required for bearer type secrets, ignored otherwise.
     */
    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj->token = $token;

        return $obj;
    }

    /**
     * The password for the secret. Required for basic type secrets, ignored otherwise.
     */
    public function withPassword(string $password): self
    {
        $obj = clone $this;
        $obj->password = $password;

        return $obj;
    }

    /**
     * The username for the secret. Required for basic type secrets, ignored otherwise.
     */
    public function withUsername(string $username): self
    {
        $obj = clone $this;
        $obj->username = $username;

        return $obj;
    }
}
