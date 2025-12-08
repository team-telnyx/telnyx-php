<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an existing credential.
 *
 * @see Telnyx\Services\TelephonyCredentialsService::update()
 *
 * @phpstan-type TelephonyCredentialUpdateParamsShape = array{
 *   connection_id?: string, expires_at?: string, name?: string, tag?: string
 * }
 */
final class TelephonyCredentialUpdateParams implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the Credential Connection this credential is associated with.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * ISO-8601 formatted date indicating when the credential will expire.
     */
    #[Optional]
    public ?string $expires_at;

    #[Optional]
    public ?string $name;

    /**
     * Tags a credential. A single tag can hold at maximum 1000 credentials.
     */
    #[Optional]
    public ?string $tag;

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
        ?string $connection_id = null,
        ?string $expires_at = null,
        ?string $name = null,
        ?string $tag = null,
    ): self {
        $obj = new self;

        null !== $connection_id && $obj['connection_id'] = $connection_id;
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
