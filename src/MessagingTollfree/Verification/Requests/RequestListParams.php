<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a list of previously-submitted tollfree verification requests.
 *
 * @see Telnyx\Services\MessagingTollfree\Verification\RequestsService::list()
 *
 * @phpstan-type RequestListParamsShape = array{
 *   page: int,
 *   pageSize: int,
 *   dateEnd?: \DateTimeInterface|null,
 *   dateStart?: \DateTimeInterface|null,
 *   phoneNumber?: string|null,
 *   status?: null|TfVerificationStatus|value-of<TfVerificationStatus>,
 * }
 */
final class RequestListParams implements BaseModel
{
    /** @use SdkModel<RequestListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $page;

    /**
     *         Request this many records per page.
     *
     *         This value is automatically clamped if the provided value is too large.
     */
    #[Required]
    public int $pageSize;

    #[Optional]
    public ?\DateTimeInterface $dateEnd;

    #[Optional]
    public ?\DateTimeInterface $dateStart;

    #[Optional]
    public ?string $phoneNumber;

    /**
     * Tollfree verification status.
     *
     * @var value-of<TfVerificationStatus>|null $status
     */
    #[Optional(enum: TfVerificationStatus::class)]
    public ?string $status;

    /**
     * `new RequestListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequestListParams::with(page: ..., pageSize: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RequestListParams)->withPage(...)->withPageSize(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $status
     */
    public static function with(
        int $page,
        int $pageSize,
        ?\DateTimeInterface $dateEnd = null,
        ?\DateTimeInterface $dateStart = null,
        ?string $phoneNumber = null,
        TfVerificationStatus|string|null $status = null,
    ): self {
        $self = new self;

        $self['page'] = $page;
        $self['pageSize'] = $pageSize;

        null !== $dateEnd && $self['dateEnd'] = $dateEnd;
        null !== $dateStart && $self['dateStart'] = $dateStart;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     *         Request this many records per page.
     *
     *         This value is automatically clamped if the provided value is too large.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    public function withDateEnd(\DateTimeInterface $dateEnd): self
    {
        $self = clone $this;
        $self['dateEnd'] = $dateEnd;

        return $self;
    }

    public function withDateStart(\DateTimeInterface $dateStart): self
    {
        $self = clone $this;
        $self['dateStart'] = $dateStart;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Tollfree verification status.
     *
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $status
     */
    public function withStatus(TfVerificationStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
