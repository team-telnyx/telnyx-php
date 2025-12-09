<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthClients\OAuthClient\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClient\ClientType;
use Telnyx\OAuthClients\OAuthClient\RecordType;

/**
 * @phpstan-type OAuthClientUpdateResponseShape = array{data?: OAuthClient|null}
 */
final class OAuthClientUpdateResponse implements BaseModel
{
    /** @use SdkModel<OAuthClientUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OAuthClient $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OAuthClient|array{
     *   clientID: string,
     *   clientType: value-of<ClientType>,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   orgID: string,
     *   recordType: value-of<RecordType>,
     *   requirePkce: bool,
     *   updatedAt: \DateTimeInterface,
     *   userID: string,
     *   allowedGrantTypes?: list<value-of<AllowedGrantType>>|null,
     *   allowedScopes?: list<string>|null,
     *   clientSecret?: string|null,
     *   logoUri?: string|null,
     *   policyUri?: string|null,
     *   redirectUris?: list<string>|null,
     *   tosUri?: string|null,
     * } $data
     */
    public static function with(OAuthClient|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param OAuthClient|array{
     *   clientID: string,
     *   clientType: value-of<ClientType>,
     *   createdAt: \DateTimeInterface,
     *   name: string,
     *   orgID: string,
     *   recordType: value-of<RecordType>,
     *   requirePkce: bool,
     *   updatedAt: \DateTimeInterface,
     *   userID: string,
     *   allowedGrantTypes?: list<value-of<AllowedGrantType>>|null,
     *   allowedScopes?: list<string>|null,
     *   clientSecret?: string|null,
     *   logoUri?: string|null,
     *   policyUri?: string|null,
     *   redirectUris?: list<string>|null,
     *   tosUri?: string|null,
     * } $data
     */
    public function withData(OAuthClient|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
