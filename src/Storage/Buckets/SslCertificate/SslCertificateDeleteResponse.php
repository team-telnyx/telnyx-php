<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SslCertificateShape from \Telnyx\Storage\Buckets\SslCertificate\SslCertificate
 *
 * @phpstan-type SslCertificateDeleteResponseShape = array{
 *   data?: null|SslCertificate|SslCertificateShape
 * }
 */
final class SslCertificateDeleteResponse implements BaseModel
{
    /** @use SdkModel<SslCertificateDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?SslCertificate $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SslCertificateShape $data
     */
    public static function with(SslCertificate|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SslCertificateShape $data
     */
    public function withData(SslCertificate|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
