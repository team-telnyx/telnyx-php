<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data\Filters;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   filters?: Filters|null,
 *   order_type?: string|null,
 *   status?: value-of<Status>|null,
 *   updated_at?: \DateTimeInterface|null,
 *   user_id?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * The filters that were applied to generate this report.
     */
    #[Optional]
    public ?Filters $filters;

    /**
     * The type of order report.
     */
    #[Optional]
    public ?string $order_type;

    /**
     * Indicates the completion level of the sub number orders report. The report must have a status of 'success' before it can be downloaded.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * The ID of the user who created the report.
     */
    #[Optional]
    public ?string $user_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Filters|array{
     *   country_code?: string|null,
     *   created_at_gt?: \DateTimeInterface|null,
     *   created_at_lt?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   order_request_id?: string|null,
     *   status?: string|null,
     * } $filters
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        Filters|array|null $filters = null,
        ?string $order_type = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $user_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $filters && $obj['filters'] = $filters;
        null !== $order_type && $obj['order_type'] = $order_type;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $user_id && $obj['user_id'] = $user_id;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * The filters that were applied to generate this report.
     *
     * @param Filters|array{
     *   country_code?: string|null,
     *   created_at_gt?: \DateTimeInterface|null,
     *   created_at_lt?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   order_request_id?: string|null,
     *   status?: string|null,
     * } $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $obj = clone $this;
        $obj['filters'] = $filters;

        return $obj;
    }

    /**
     * The type of order report.
     */
    public function withOrderType(string $orderType): self
    {
        $obj = clone $this;
        $obj['order_type'] = $orderType;

        return $obj;
    }

    /**
     * Indicates the completion level of the sub number orders report. The report must have a status of 'success' before it can be downloaded.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * The ID of the user who created the report.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }
}
