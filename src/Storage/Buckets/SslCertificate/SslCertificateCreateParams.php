<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Uploads an SSL certificate and its matching secret so that you can use Telnyx’s storage as your CDN.
 *
 * @see Telnyx\Storage\Buckets\SslCertificate->create
 *
 * @phpstan-type ssl_certificate_create_params = array{
 *   certificate?: string, privateKey?: string
 * }
 */
final class SslCertificateCreateParams implements BaseModel
{
    /** @use SdkModel<ssl_certificate_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The SSL certificate file.
     */
    #[Api(optional: true)]
    public ?string $certificate;

    /**
     * The private key file.
     */
    #[Api('private_key', optional: true)]
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
        $obj = new self;

        null !== $certificate && $obj->certificate = $certificate;
        null !== $privateKey && $obj->privateKey = $privateKey;

        return $obj;
    }

    /**
     * The SSL certificate file.
     */
    public function withCertificate(string $certificate): self
    {
        $obj = clone $this;
        $obj->certificate = $certificate;

        return $obj;
    }

    /**
     * The private key file.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $obj = clone $this;
        $obj->privateKey = $privateKey;

        return $obj;
    }
}
