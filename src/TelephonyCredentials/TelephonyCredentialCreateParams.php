<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new TelephonyCredentialCreateParams); // set properties as needed
 * $client->telephonyCredentials->create(...$params->toArray());
 * ```
 * Create a credential.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->telephonyCredentials->create(...$params->toArray());`
 *
 * @see Telnyx\TelephonyCredentials->create
 *
 * @phpstan-type telephony_credential_create_params = array{
 *   connectionID: string, expiresAt?: string, name?: string, tag?: string
 * }
 */
final class TelephonyCredentialCreateParams implements BaseModel
{
    /** @use SdkModel<telephony_credential_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the Credential Connection this credential is associated with.
     */
    #[Api('connection_id')]
    public string $connectionID;

    /**
     * ISO-8601 formatted date indicating when the credential will expire.
     */
    #[Api('expires_at', optional: true)]
    public ?string $expiresAt;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * Tags a credential. A single tag can hold at maximum 1000 credentials.
     */
    #[Api(optional: true)]
    public ?string $tag;

    /**
     * `new TelephonyCredentialCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelephonyCredentialCreateParams::with(connectionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelephonyCredentialCreateParams)->withConnectionID(...)
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
        string $connectionID,
        ?string $expiresAt = null,
        ?string $name = null,
        ?string $tag = null,
    ): self {
        $obj = new self;

        $obj->connectionID = $connectionID;

        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $name && $obj->name = $name;
        null !== $tag && $obj->tag = $tag;

        return $obj;
    }

    /**
     * Identifies the Credential Connection this credential is associated with.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the credential will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Tags a credential. A single tag can hold at maximum 1000 credentials.
     */
    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj->tag = $tag;

        return $obj;
    }
}
