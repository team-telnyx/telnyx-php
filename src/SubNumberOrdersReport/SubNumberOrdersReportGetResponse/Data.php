<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse\Data\Filters;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse\Data\Status;

/**
 * @phpstan-import-type FiltersShape from \Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse\Data\Filters
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   filters?: null|Filters|FiltersShape,
 *   orderType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
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
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The filters that were applied to generate this report.
     */
    #[Optional]
    public ?Filters $filters;

    /**
     * The type of order report.
     */
    #[Optional('order_type')]
    public ?string $orderType;

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
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The ID of the user who created the report.
     */
    #[Optional('user_id')]
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
     * @param FiltersShape $filters
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        Filters|array|null $filters = null,
        ?string $orderType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $filters && $self['filters'] = $filters;
        null !== $orderType && $self['orderType'] = $orderType;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The filters that were applied to generate this report.
     *
     * @param FiltersShape $filters
     */
    public function withFilters(Filters|array $filters): self
    {
        $self = clone $this;
        $self['filters'] = $filters;

        return $self;
    }

    /**
     * The type of order report.
     */
    public function withOrderType(string $orderType): self
    {
        $self = clone $this;
        $self['orderType'] = $orderType;

        return $self;
    }

    /**
     * Indicates the completion level of the sub number orders report. The report must have a status of 'success' before it can be downloaded.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The ID of the user who created the report.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
