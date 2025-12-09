<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Uploads an SSL certificate and its matching secret so that you can use Telnyx's storage as your CDN.
 *
 * @see Telnyx\Services\Storage\Buckets\SslCertificateService::create()
 *
 * @phpstan-type SslCertificateCreateParamsShape = array{
 *   certificate?: string, privateKey?: string
 * }
 */
final class SslCertificateCreateParams implements BaseModel
{
    /** @use SdkModel<SslCertificateCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The SSL certificate file.
     */
    #[Optional]
    public ?string $certificate;

    /**
     * The private key file.
     */
    #[Optional('private_key')]
    public ?string $privateKey;

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
        ?string $certificate = null,
        ?string $privateKey = null
    ): self {
        $self = new self;

        null !== $certificate && $self['certificate'] = $certificate;
        null !== $privateKey && $self['privateKey'] = $privateKey;

        return $self;
    }

    /**
     * The SSL certificate file.
     */
    public function withCertificate(string $certificate): self
    {
        $self = clone $this;
        $self['certificate'] = $certificate;

        return $self;
    }

    /**
     * The private key file.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $self = clone $this;
        $self['privateKey'] = $privateKey;

        return $self;
    }
}
