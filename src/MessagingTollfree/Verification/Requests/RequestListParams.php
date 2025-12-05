<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests;

use Telnyx\Core\Attributes\Api;
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
 *   page_size: int,
 *   date_end?: \DateTimeInterface,
 *   date_start?: \DateTimeInterface,
 *   phone_number?: string,
 *   status?: TfVerificationStatus|value-of<TfVerificationStatus>,
 * }
 */
final class RequestListParams implements BaseModel
{
    /** @use SdkModel<RequestListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $page;

    /**
     *         Request this many records per page.
     *
     *         This value is automatically clamped if the provided value is too large.
     */
    #[Api]
    public int $page_size;

    #[Api(optional: true)]
    public ?\DateTimeInterface $date_end;

    #[Api(optional: true)]
    public ?\DateTimeInterface $date_start;

    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Tollfree verification status.
     *
     * @var value-of<TfVerificationStatus>|null $status
     */
    #[Api(enum: TfVerificationStatus::class, optional: true)]
    public ?string $status;

    /**
     * `new RequestListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RequestListParams::with(page: ..., page_size: ...)
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
        int $page_size,
        ?\DateTimeInterface $date_end = null,
        ?\DateTimeInterface $date_start = null,
        ?string $phone_number = null,
        TfVerificationStatus|string|null $status = null,
    ): self {
        $obj = new self;

        $obj['page'] = $page;
        $obj['page_size'] = $page_size;

        null !== $date_end && $obj['date_end'] = $date_end;
        null !== $date_start && $obj['date_start'] = $date_start;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
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
        $obj['page_size'] = $pageSize;

        return $obj;
    }

    public function withDateEnd(\DateTimeInterface $dateEnd): self
    {
        $obj = clone $this;
        $obj['date_end'] = $dateEnd;

        return $obj;
    }

    public function withDateStart(\DateTimeInterface $dateStart): self
    {
        $obj = clone $this;
        $obj['date_start'] = $dateStart;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
