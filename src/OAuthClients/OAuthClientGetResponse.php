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
 * @phpstan-type OAuthClientGetResponseShape = array{data?: OAuthClient|null}
 */
final class OAuthClientGetResponse implements BaseModel
{
    /** @use SdkModel<OAuthClientGetResponseShape> */
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
