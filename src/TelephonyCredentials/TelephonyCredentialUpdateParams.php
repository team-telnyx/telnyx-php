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
 *   connectionID?: string, expiresAt?: string, name?: string, tag?: string
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
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * ISO-8601 formatted date indicating when the credential will expire.
     */
    #[Optional('expires_at')]
    public ?string $expiresAt;

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
        ?string $connectionID = null,
        ?string $expiresAt = null,
        ?string $name = null,
        ?string $tag = null,
    ): self {
        $self = new self;

        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $name && $self['name'] = $name;
        null !== $tag && $self['tag'] = $tag;

        return $self;
    }

    /**
     * Identifies the Credential Connection this credential is associated with.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * ISO-8601 formatted date indicating when the credential will expire.
     */
    public function withExpiresAt(string $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Tags a credential. A single tag can hold at maximum 1000 credentials.
     */
    public function withTag(string $tag): self
    {
        $self = clone $this;
        $self['tag'] = $tag;

        return $self;
    }
}
