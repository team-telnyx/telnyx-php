<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create an Access Token (JWT) for the credential.
 *
 * @see Telnyx\Services\TelephonyCredentialsService::createToken()
 *
 * @phpstan-type TelephonyCredentialCreateTokenParamsShape = array{
 *   idempotencyKey?: string|null
 * }
 */
final class TelephonyCredentialCreateTokenParams implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialCreateTokenParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $idempotencyKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $idempotencyKey = null): self
    {
        $self = new self;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
