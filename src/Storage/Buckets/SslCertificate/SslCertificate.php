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
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   issued_by?: IssuedBy|null,
 *   issued_to?: IssuedTo|null,
 *   valid_from?: \DateTimeInterface|null,
 *   valid_to?: \DateTimeInterface|null,
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
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?IssuedBy $issued_by;

    #[Api(optional: true)]
    public ?IssuedTo $issued_to;

    /**
     * The time the certificate is valid from.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $valid_from;

    /**
     * The time the certificate is valid to.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $valid_to;

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
        ?\DateTimeInterface $created_at = null,
        ?IssuedBy $issued_by = null,
        ?IssuedTo $issued_to = null,
        ?\DateTimeInterface $valid_from = null,
        ?\DateTimeInterface $valid_to = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $issued_by && $obj->issued_by = $issued_by;
        null !== $issued_to && $obj->issued_to = $issued_to;
        null !== $valid_from && $obj->valid_from = $valid_from;
        null !== $valid_to && $obj->valid_to = $valid_to;

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
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withIssuedBy(IssuedBy $issuedBy): self
    {
        $obj = clone $this;
        $obj->issued_by = $issuedBy;

        return $obj;
    }

    public function withIssuedTo(IssuedTo $issuedTo): self
    {
        $obj = clone $this;
        $obj->issued_to = $issuedTo;

        return $obj;
    }

    /**
     * The time the certificate is valid from.
     */
    public function withValidFrom(\DateTimeInterface $validFrom): self
    {
        $obj = clone $this;
        $obj->valid_from = $validFrom;

        return $obj;
    }

    /**
     * The time the certificate is valid to.
     */
    public function withValidTo(\DateTimeInterface $validTo): self
    {
        $obj = clone $this;
        $obj->valid_to = $validTo;

        return $obj;
    }
}
