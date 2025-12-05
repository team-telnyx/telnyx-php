<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a credential.
 *
 * @see Telnyx\Services\TelephonyCredentialsService::create()
 *
 * @phpstan-type TelephonyCredentialCreateParamsShape = array{
 *   connection_id: string, expires_at?: string, name?: string, tag?: string
 * }
 */
final class TelephonyCredentialCreateParams implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the Credential Connection this credential is associated with.
     */
    #[Api]
    public string $connection_id;

    /**
     * ISO-8601 formatted date indicating when the credential will expire.
     */
    #[Api(optional: true)]
    public ?string $expires_at;

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
     * TelephonyCredentialCreateParams::with(connection_id: ...)
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
        string $connection_id,
        ?string $expires_at = null,
        ?string $name = null,
        ?string $tag = null,
    ): self {
        $obj = new self;

        $obj['connection_id'] = $connection_id;

        null !== $expires_at && $obj['expires_at'] = $expires_at;
        null !== $name && $obj['name'] = $name;
        null !== $tag && $obj['tag'] = $tag;

        return $obj;
    }

    /**
     * Identifies the Credential Connection this credential is associated with.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * ISO-8601 formatted date indicating when the credential will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $obj = clone $this;
        $obj['expires_at'] = $expiresAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Tags a credential. A single tag can hold at maximum 1000 credentials.
     */
    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj['tag'] = $tag;

        return $obj;
    }
}
