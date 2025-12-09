<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TelephonyCredentialNewResponseShape = array{
 *   data?: TelephonyCredential|null
 * }
 */
final class TelephonyCredentialNewResponse implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?TelephonyCredential $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TelephonyCredential|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   expired?: bool|null,
     *   expiresAt?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   resourceID?: string|null,
     *   sipPassword?: string|null,
     *   sipUsername?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(TelephonyCredential|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param TelephonyCredential|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   expired?: bool|null,
     *   expiresAt?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   resourceID?: string|null,
     *   sipPassword?: string|null,
     *   sipUsername?: string|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(TelephonyCredential|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
