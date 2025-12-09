<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuthGrants\OAuthGrant\RecordType;

/**
 * @phpstan-type OAuthGrantGetResponseShape = array{data?: OAuthGrant|null}
 */
final class OAuthGrantGetResponse implements BaseModel
{
    /** @use SdkModel<OAuthGrantGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OAuthGrant $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OAuthGrant|array{
     *   id: string,
     *   clientID: string,
     *   createdAt: \DateTimeInterface,
     *   recordType: value-of<RecordType>,
     *   scopes: list<string>,
     *   lastUsedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(OAuthGrant|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param OAuthGrant|array{
     *   id: string,
     *   clientID: string,
     *   createdAt: \DateTimeInterface,
     *   recordType: value-of<RecordType>,
     *   scopes: list<string>,
     *   lastUsedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(OAuthGrant|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
