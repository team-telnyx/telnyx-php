<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedBy;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedTo;

/**
 * @phpstan-type SslCertificateNewResponseShape = array{data?: SslCertificate|null}
 */
final class SslCertificateNewResponse implements BaseModel
{
    /** @use SdkModel<SslCertificateNewResponseShape> */
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
     * @param SslCertificate|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   issuedBy?: IssuedBy|null,
     *   issuedTo?: IssuedTo|null,
     *   validFrom?: \DateTimeInterface|null,
     *   validTo?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(SslCertificate|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param SslCertificate|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   issuedBy?: IssuedBy|null,
     *   issuedTo?: IssuedTo|null,
     *   validFrom?: \DateTimeInterface|null,
     *   validTo?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(SslCertificate|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
