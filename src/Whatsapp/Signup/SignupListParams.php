<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Signup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List finished WhatsApp Embedded Signup sessions, with status `SUCCESS` or `FAILURE`, newest first. Use the `errors` of a failed session to see why provisioning stopped.
 *
 * @see Telnyx\Services\Whatsapp\SignupService::list()
 *
 * @phpstan-type SignupListParamsShape = array{
 *   filterCreatedAtGte?: \DateTimeInterface|null,
 *   filterCreatedAtLte?: \DateTimeInterface|null,
 *   filterCustomerID?: string|null,
 *   filterWabaID?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class SignupListParams implements BaseModel
{
    /** @use SdkModel<SignupListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Return sessions created at or after this time (RFC 3339).
     */
    #[Optional]
    public ?\DateTimeInterface $filterCreatedAtGte;

    /**
     * Return sessions created at or before this time (RFC 3339).
     */
    #[Optional]
    public ?\DateTimeInterface $filterCreatedAtLte;

    /**
     * Filter by the tech provider customer reference.
     */
    #[Optional]
    public ?string $filterCustomerID;

    /**
     * Filter by Meta WABA ID.
     */
    #[Optional]
    public ?string $filterWabaID;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

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
        ?\DateTimeInterface $filterCreatedAtGte = null,
        ?\DateTimeInterface $filterCreatedAtLte = null,
        ?string $filterCustomerID = null,
        ?string $filterWabaID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterCreatedAtGte && $self['filterCreatedAtGte'] = $filterCreatedAtGte;
        null !== $filterCreatedAtLte && $self['filterCreatedAtLte'] = $filterCreatedAtLte;
        null !== $filterCustomerID && $self['filterCustomerID'] = $filterCustomerID;
        null !== $filterWabaID && $self['filterWabaID'] = $filterWabaID;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Return sessions created at or after this time (RFC 3339).
     */
    public function withFilterCreatedAtGte(
        \DateTimeInterface $filterCreatedAtGte
    ): self {
        $self = clone $this;
        $self['filterCreatedAtGte'] = $filterCreatedAtGte;

        return $self;
    }

    /**
     * Return sessions created at or before this time (RFC 3339).
     */
    public function withFilterCreatedAtLte(
        \DateTimeInterface $filterCreatedAtLte
    ): self {
        $self = clone $this;
        $self['filterCreatedAtLte'] = $filterCreatedAtLte;

        return $self;
    }

    /**
     * Filter by the tech provider customer reference.
     */
    public function withFilterCustomerID(string $filterCustomerID): self
    {
        $self = clone $this;
        $self['filterCustomerID'] = $filterCustomerID;

        return $self;
    }

    /**
     * Filter by Meta WABA ID.
     */
    public function withFilterWabaID(string $filterWabaID): self
    {
        $self = clone $this;
        $self['filterWabaID'] = $filterWabaID;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
