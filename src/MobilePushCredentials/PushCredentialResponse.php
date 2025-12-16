<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Success response with details about a push credential.
 *
 * @phpstan-import-type PushCredentialShape from \Telnyx\MobilePushCredentials\PushCredential
 *
 * @phpstan-type PushCredentialResponseShape = array{
 *   data?: null|PushCredential|PushCredentialShape
 * }
 */
final class PushCredentialResponse implements BaseModel
{
    /** @use SdkModel<PushCredentialResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PushCredential $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PushCredentialShape $data
     */
    public static function with(PushCredential|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PushCredentialShape $data
     */
    public function withData(PushCredential|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
