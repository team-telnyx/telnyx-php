<?php

declare(strict_types=1);

namespace Telnyx\CredentialConnections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CredentialConnectionShape from \Telnyx\CredentialConnections\CredentialConnection
 *
 * @phpstan-type CredentialConnectionGetResponseShape = array{
 *   data?: null|CredentialConnection|CredentialConnectionShape
 * }
 */
final class CredentialConnectionGetResponse implements BaseModel
{
    /** @use SdkModel<CredentialConnectionGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?CredentialConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CredentialConnection|CredentialConnectionShape|null $data
     */
    public static function with(CredentialConnection|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CredentialConnection|CredentialConnectionShape $data
     */
    public function withData(CredentialConnection|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
