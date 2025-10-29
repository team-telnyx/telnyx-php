<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedBy;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedTo;

/**
 * @phpstan-type SslCertificateShape = array{
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   issuedBy?: IssuedBy,
 *   issuedTo?: IssuedTo,
 *   validFrom?: \DateTimeInterface,
 *   validTo?: \DateTimeInterface,
 * }
 */
final class SslCertificate implements BaseModel
{
    /** @use SdkModel<SslCertificateShape> */
    use SdkModel;

    /**
     * Unique identifier for the SSL certificate.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Time when SSL certificate was uploaded.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('issued_by', optional: true)]
    public ?IssuedBy $issuedBy;

    #[Api('issued_to', optional: true)]
    public ?IssuedTo $issuedTo;

    /**
     * The time the certificate is valid from.
     */
    #[Api('valid_from', optional: true)]
    public ?\DateTimeInterface $validFrom;

    /**
     * The time the certificate is valid to.
     */
    #[Api('valid_to', optional: true)]
    public ?\DateTimeInterface $validTo;

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
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?IssuedBy $issuedBy = null,
        ?IssuedTo $issuedTo = null,
        ?\DateTimeInterface $validFrom = null,
        ?\DateTimeInterface $validTo = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $issuedBy && $obj->issuedBy = $issuedBy;
        null !== $issuedTo && $obj->issuedTo = $issuedTo;
        null !== $validFrom && $obj->validFrom = $validFrom;
        null !== $validTo && $obj->validTo = $validTo;

        return $obj;
    }

    /**
     * Unique identifier for the SSL certificate.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Time when SSL certificate was uploaded.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withIssuedBy(IssuedBy $issuedBy): self
    {
        $obj = clone $this;
        $obj->issuedBy = $issuedBy;

        return $obj;
    }

    public function withIssuedTo(IssuedTo $issuedTo): self
    {
        $obj = clone $this;
        $obj->issuedTo = $issuedTo;

        return $obj;
    }

    /**
     * The time the certificate is valid from.
     */
    public function withValidFrom(\DateTimeInterface $validFrom): self
    {
        $obj = clone $this;
        $obj->validFrom = $validFrom;

        return $obj;
    }

    /**
     * The time the certificate is valid to.
     */
    public function withValidTo(\DateTimeInterface $validTo): self
    {
        $obj = clone $this;
        $obj->validTo = $validTo;

        return $obj;
    }
}
