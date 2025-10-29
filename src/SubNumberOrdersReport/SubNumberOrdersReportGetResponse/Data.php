<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse\Data\Filters;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   filters?: Filters,
 *   orderType?: string,
 *   status?: value-of<Status>,
 *   updatedAt?: \DateTimeInterface,
 *   userID?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The filters that were applied to generate this report.
     */
    #[Api(optional: true)]
    public ?Filters $filters;

    /**
     * The type of order report.
     */
    #[Api('order_type', optional: true)]
    public ?string $orderType;

    /**
     * Indicates the completion level of the sub number orders report. The report must have a status of 'success' before it can be downloaded.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user who created the report.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?Filters $filters = null,
        ?string $orderType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $filters && $obj->filters = $filters;
        null !== $orderType && $obj->orderType = $orderType;
        null !== $status && $obj['status'] = $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $userID && $obj->userID = $userID;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The filters that were applied to generate this report.
     */
    public function withFilters(Filters $filters): self
    {
        $obj = clone $this;
        $obj->filters = $filters;

        return $obj;
    }

    /**
     * The type of order report.
     */
    public function withOrderType(string $orderType): self
    {
        $obj = clone $this;
        $obj->orderType = $orderType;

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
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The ID of the user who created the report.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }
}
