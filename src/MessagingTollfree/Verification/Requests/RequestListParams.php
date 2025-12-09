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
 *   dateEnd?: \DateTimeInterface,
 *   dateStart?: \DateTimeInterface,
 *   phoneNumber?: string,
 *   status?: TfVerificationStatus|value-of<TfVerificationStatus>,
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
        $obj = new self;

        $obj['page'] = $page;
        $obj['pageSize'] = $pageSize;

        null !== $dateEnd && $obj['dateEnd'] = $dateEnd;
        null !== $dateStart && $obj['dateStart'] = $dateStart;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     *         Request this many records per page.
     *
     *         This value is automatically clamped if the provided value is too large.
     */
    public function withPageSize(int $pageSize): self
    {
        $obj = clone $this;
        $obj['pageSize'] = $pageSize;

        return $obj;
    }

    public function withDateEnd(\DateTimeInterface $dateEnd): self
    {
        $obj = clone $this;
        $obj['dateEnd'] = $dateEnd;

        return $obj;
    }

    public function withDateStart(\DateTimeInterface $dateStart): self
    {
        $obj = clone $this;
        $obj['dateStart'] = $dateStart;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Tollfree verification status.
     *
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $status
     */
    public function withStatus(TfVerificationStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
